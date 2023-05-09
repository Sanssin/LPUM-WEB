<?php

namespace App\Services;

use App\Models\User;
use App\Models\Election;

class SyncAgendaService
{
    public $election;

    public function handle($election_id, $data, $action): string
    {
        $this->election = Election::find($election_id);

        $preparedData = $this->prepareData($data->validated());

        switch ($action) {
            case 'sync':
                $message = $this->sync($preparedData);
                break;

            case 'update':
                $message = $this->update($preparedData);
                break;
        }

        return $message;
    }

    private function prepareData(array $data): array
    {
        $start_event = $data['start_event'];
        $end_event = $data['end_event'];
        $method = $data['method'];
        $location = $data['location'];

        $event = collect($data['event']);

        $finalData = $event->mapWithKeys(function ($item, $key) use ($start_event, $end_event, $method, $location) {
            return [$item => [
                'method' => $method[$key],
                'start_event' => $start_event[$key],
                'end_event' => $end_event[$key],
                'location' => $location[$key]
            ]];
        })->toArray();

        return $finalData;
    }

    private function sync($preparedData)
    {
        $this->election->event()->sync($preparedData);

        return "mengisi ulang";
    }

    private function update($preparedData)
    {
        $this->election->event()->syncWithoutDetaching($preparedData);

        return "memperbarui ";
    }
}
