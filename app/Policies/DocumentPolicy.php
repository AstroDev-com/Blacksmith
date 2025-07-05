<?php

namespace App\Policies;

use App\Models\Document;
use App\Models\User;
use App\Models\Trip;
use Illuminate\Auth\Access\Response;

class DocumentPolicy
{
    /**
     * Always allow admins to perform any action.
     * You might want to refine this based on specific admin roles.
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->hasRole('super-admin') || $user->hasRole('admin')) { // Adjust roles as needed
            return true;
        }
        return null; // Let other methods decide
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Allow logged-in users to view lists (adjust if needed)
        return true;
    }

    /**
     * Determine whether the user can view the model.
     * Allow viewing if the user owns the trip the document belongs to.
     */
    public function view(User $user, Document $document): bool
    {
        // User can view a document if they own the parent trip
        return $user->id === $document->trip->user_id;
    }

    /**
     * Determine whether the user can create documents for a specific trip.
     * Only the trip owner can upload documents to their trip.
     */
    public function create(User $user, Trip $trip): bool
    {
        return $user->id === $trip->user_id;
    }

    /**
     * Determine whether the user can update the model.
     * (Not implemented for now, can be added if needed)
     */
    public function update(User $user, Document $document): bool
    {
        return false; // Or implement logic: $user->id === $document->user_id || $user->id === $document->trip->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     * Allow deletion if the user uploaded the document OR owns the trip.
     */
    public function delete(User $user, Document $document): bool
    {
        return $user->id === $document->user_id || $user->id === $document->trip->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Document $document): bool
    {
        // Typically matches delete permissions or admin-only
        return $this->delete($user, $document);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Document $document): bool
    {
        // Typically matches delete permissions or admin-only
        return $this->delete($user, $document);
    }
}
