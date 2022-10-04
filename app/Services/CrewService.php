<?php

namespace App\Services;

use App\Models\Crew;
use App\Models\RankType;
use App\Models\User;
use App\Traits\DateUtility;
use App\Traits\EmployeeTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class CrewService
{

    use DateUtility;

    public function getCrewListPaginated(object $params)
    {
        $count = $params->count ?? 10;
        $searchValue = $params->searchValue ?? null;
        $status = $params->status ?? null;

        $crew = Crew::query()
            ->when($searchValue != null, function (Builder $query) use ($searchValue) {
                $query->where('crew_code', 'like', '%' . $searchValue . '%')
                    ->orWhere('last_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('first_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('middle_name', 'like', '%' . $searchValue . '%');
            })
            ->when($status != null, function (Builder $query) use ($status) {
                $query->where('status', '=', $status);
            })
            ->paginate($count);

        $crew->getCollection()->transform(function ($crew) {

            $createdBy = User::query()
                ->where('id', $crew->created_by)
                ->first();

            $updatedBy = User::query()
                ->where('id', $crew->updated_by)
                ->first();

            $rankType = RankType::query()
                ->where('id', $crew->rank->rank_type)
                ->first();

            return [
                'id' => $crew->id,
                'code' => $crew->code,
                'last_name' => $crew->last_name,
                'first_name' => $crew->first_name,
                'middle_name' => $crew->middle_name,
                'suffix_name' => $crew->suffix_name,
                'crew_code' => $crew->crew_code,
                'birth_date' => $crew->birth_date,
                'birth_place' => $crew->birth_place,
                'crew_type' => $crew->crew_type,
                'weight' => $crew->weight,
                'height' => $crew->height,
                'hair_color' => $crew->hair_color,
                'eye_color' => $crew->eye_color,
                'blood_type' => $crew->blood_type,
                'sss' => $crew->sss,
                'tin' => $crew->tin,
                'phil_health' => $crew->phil_health,
                'pag_ibig' => $crew->pag_ibig,
                'jacket' => $crew->jacket,
                'shoes' => $crew->shoes,
                'long_sleeves' => $crew->long_sleeves,
                'short_sleeves' => $crew->short_sleeves,
                'uniform' => $crew->uniform,
                'cover_all' => $crew->cover_all,
                'pants' => $crew->pants,
                'isHired' => $crew->isHired,
                'date_hired' => $crew->date_hired,
                'religion_id' => $crew->religion_id,
                'country_id' => $crew->country_id,
                'rank_id' => $crew->rank_id,
                'country' => $crew->country,
                'rank' => $crew->rank,
                'rankType' => $rankType,
                'gender_id' => $crew->gender_id,
                'civil_status' => $crew->civil_status,
                'status' => $crew->status,
                'full_name' => EmployeeTrait::getFullName($crew),
                'created_by' => EmployeeTrait::getFullName($createdBy) ?? null,
                'updated_by' => EmployeeTrait::getFullName($updatedBy) ?? null,
                'created_at' => Carbon::parse($crew->created_at)->format('d, M Y') ?? null,
                'updated_at' => Carbon::parse($crew->updated_at)->format('d, M Y') ?? null,
            ];
        });

        return $crew;
    }
}
