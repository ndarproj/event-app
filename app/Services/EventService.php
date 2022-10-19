<?php

namespace App\Services;

use App\Models\Event;
use App\Repositories\EventRepository;
use Illuminate\Database\Eloquent\Collection;

//all unrelated data manipulation should be done here
class EventService
{
    //php8 (constructor property promotion)
    public function __construct(private EventRepository $eventRepository)
    {
    }

    public function get(): Collection
    {
        $events = $this->eventRepository->all();
        return $events;;
    }

    public function store($payload): EventRepository
    {
        $event = $this->eventRepository->create($payload);
        return $event;
    }

    public function show($id): EventRepository
    {
        $event = $this->eventRepository->findOrFail($id);
        return $event;
    }

    public function update($payload, $id): bool
    {
        $event = $this->eventRepository->findOrFail($id)->update($payload);
        return $event;
    }

    public function destroy($id): bool
    {
        $event = $this->eventRepository->findOrFail($id)->delete();
        return $event;
    }
}
