<?php

namespace App\Imports;

use App\City;
use App\Company;
use App\Country;
use App\FunctionalArea;
use App\Job;
use App\JobType;
use App\State;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class JobImport implements ToModel ,WithHeadingRow,WithValidation,SkipsOnFailure
{
    use Importable,SkipsErrors,SkipsFailures;

    /**
    * @param array $rows
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        HeadingRowFormatter::default('none');



            $job = Job::create([
                'company_id'=>Company::query()->where('name',$row['company'])->get()->first()->id
                ,'title'=>$row["title"]
                ,'description'=>$row['description']
                ,'country_id'=>Country::query()->where('country',$row['country'])->get()->first()->country_id
//                ,'state_id'=>State::query()->where('state',$row['state'])->get()->first()->state_id
                ,'city_id'=>City::query()->where('city',$row['city'])->get()->first()->city_id
                ,'functional_area_id'=>FunctionalArea::query()->where('functional_area',$row['functional_area'])->get()->first()->functional_area_id
                ,'job_type_id'=>JobType::query()->where('job_type',$row['job_type'])->get()->first()->job_type_id
            ]);


    }

    public function rules(): array
    {
        return [
        ];
    }
}
