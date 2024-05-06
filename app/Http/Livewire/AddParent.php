<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Father;
use App\Models\Mother;
use App\Models\Parents;
use Livewire\Component;
use App\Models\Religion;
use App\Models\ParentAtt;
use App\Models\Type_Blood;
use App\Models\Nationality;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AddParent extends Component
{
    use WithFileUploads;
    use WithFileUploads;
    public Parents $parent;
    public $photos;
    public $currentStep = 1,

    $showEdit = null,
    $email, $password, $message = '', $error_message = '', $showform = '', $id_edit,


    /*father */

    $name_Father_ar, $name_Father_en, $job_Father, $job_Father_en, $national_ID_Father,
    $passport_ID_Father, $phone_Father, $nationality_Father_id, $blood_Type_Father_id, $religion_Father_id,
    $address_Father,

    /*mother */

    $name_Mother_ar, $name_Mother_en, $job_Mother, $job_Mother_en, $national_ID_Mother,
    $passport_ID_Mother, $phone_Mother, $nationality_Mother_id, $blood_Type_Mother_id,
    $religion_Mother_id, $address_Mother;




    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'email' => 'required| email| unique:parents',
            'name_Father_ar' => 'required|min:3',
            'name_Mother_ar' => 'required|min:3',
            'name_Mother_en' => 'required|min:3',
            'name_Father_en' => 'required|min:3',
            'password' => 'required|min:8',
        ]);
    }
    public function render()
    {


        return view('livewire.add-parent', [
            'religion' => Religion::all(),
            'type_blood' => Type_Blood::all(),
            'nationalty' => Nationality::all(),
            'parents' => Parents::all(),
            'fathers' => Father::all(),
            'mother' => Mother::all()
        ]);
    }

    public function StepSubmit()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'email' => 'required|unique:parents',
                'national_ID_Father' => 'required',
                'passport_ID_Father' => 'required',
                'name_Father_en' => 'required',
                'name_Father_ar' => 'required',
                'address_Father' => 'required',
                'job_Father' => 'required',
                'job_Father_en' => 'required',
                'phone_Father' => 'required',
                'nationality_Father_id' => 'required',
                'religion_Father_id' => 'required',
                'blood_Type_Father_id' => 'required',
            ]);

        } elseif ($this->currentStep == 2) {
            $this->validate([
                'national_ID_Mother' => 'required',
                'passport_ID_Mother' => 'required',
                'name_Mother_en' => 'required',
                'name_Mother_ar' => 'required',
                'job_Mother' => 'required',
                'job_Mother_en' => 'required',
                'address_Mother' => 'required',
                'phone_Mother' => 'required',
                'nationality_Mother_id' => 'required',
                'religion_Mother_id' => 'required',
                'blood_Type_Mother_id' => 'required',
            ]);

        }


        $this->currentStep += 1;
        $this->showEdit = '';
    }
    public function back($n)
    {
        $this->currentStep = $n;
    }
    public function submit()
    {
        try {

            $f = Father::create([
                'national_Id_Father' => $this->national_ID_Father,
                'passport_Id_Father' => $this->passport_ID_Father,
                'name_Father' => [
                    'en' => $this->name_Father_en,
                    'ar' => $this->name_Father_ar
                ],
                'job_Father' => [
                    'en' => $this->job_Father,
                    'ar' => $this->job_Father_en
                ],
                'address_Father' => $this->address_Father,

                'phone_Father' => $this->phone_Father,
                'nationalities_Father_id' => $this->nationality_Father_id,
                'religions_Father_id' => $this->religion_Father_id,
                'type_Bloods_Father_id' => $this->blood_Type_Father_id,
            ]);
            $m = Mother::create([
                'national_Id_Mother' => $this->national_ID_Mother,
                'passport_Id_Mother' => $this->passport_ID_Mother,
                'name_Mother' => [
                    'en' => $this->name_Mother_en,
                    'ar' => $this->name_Mother_ar
                ],
                'job_Mother' => [
                    'en' => $this->job_Mother,
                    'ar' => $this->job_Mother_en
                ],
                'address_Mother' => $this->address_Mother,
                'phone_mother' => $this->phone_Mother,
                'nationalities_Mother_id' => $this->nationality_Mother_id,
                'religions_Mother_id' => $this->religion_Mother_id,
                'type_Bloods_Mother_id' => $this->blood_Type_Mother_id
            ]);
            $f_id = Father::where('phone_Father', $this->phone_Father)->first()->id;
            $m_id = Mother::where('phone_mother', $this->phone_Mother)->first()->id;

            $parent = Parents::create([
                'password' => Hash::make($this->password),
                'email' => $this->email,
                'fathers_id' => $f_id,
                'mothers_id' => $m_id
            ]);
            if ($this->photos) {
                foreach ($this->photos as $photo) {
                    $photo->storeAs($this->national_ID_Father, $photo->getClientOriginalName(), 'parent_att');
                    ParentAtt::create([
                        'name_photo' => $photo->getClientOriginalName(),
                        'parents_id' => Parents::latest()->first()->id
                    ]);
                }
            }

            $this->clear();
            $this->message = 'Post successfully updated.';
            $this->currentStep = 1;

        } catch (Exception $e) {
            $this->error_message = trans('parents.error_message');
            $this->currentStep = 1;

        }

    }
    public function clear()
    {
        $this->password = null;
        $this->email = null;
        $this->national_ID_Father = null;
        $this->passport_ID_Father = null;
        $this->name_Father_en = null;
        $this->name_Father_ar = null;
        $this->address_Father = null;
        $this->job_Father = null;
        $this->job_Father_en = null;
        $this->phone_Father = null;
        $this->nationality_Father_id = null;
        $this->religion_Father_id = null;
        $this->blood_Type_Father_id = null;
        $this->national_ID_Mother = null;
        $this->passport_ID_Mother = null;
        $this->name_Mother_en = null;
        $this->name_Mother_ar = null;
        $this->job_Mother = null;
        $this->job_Mother_en = null;
        $this->address_Mother = null;
        $this->phone_Mother = null;
        $this->nationality_Mother_id = null;
        $this->religion_Mother_id = null;
        $this->blood_Type_Mother_id = null;



    }
    public function showformadd()
    {
        $this->showform = 'yes';
    }
    public function edit($id)
    {
        //$this->password = null;
        $ff = Parents::find($id);
        $this->id_edit = $id;
        $this->email = $ff->email;
        $this->password = $ff->password;
        $this->national_ID_Father = $ff->father->national_Id_Father;
        $this->passport_ID_Father = $ff->father->passport_Id_Father;
        $this->name_Father_en = $ff->father->getTranslation('name_Father', 'en');
        $this->name_Father_ar = $ff->father->getTranslation('name_Father', 'ar');
        $this->address_Father = $ff->father->address_Father;
        $this->job_Father = $ff->father->getTranslation('job_Father', 'ar');
        $this->job_Father_en = $ff->father->getTranslation('job_Father', 'en');
        $this->phone_Father = $ff->father->phone_Father;
        $this->nationality_Father_id = $ff->father->nationalities_Father_id;
        $this->religion_Father_id = $ff->father->religions_Father_id;
        $this->blood_Type_Father_id = $ff->father->type_Bloods_Father_id;
        $this->national_ID_Mother = $ff->mother->national_Id_Mother;
        $this->passport_ID_Mother = $ff->mother->passport_Id_Mother;
        $this->name_Mother_en = $ff->mother->getTranslation('name_Mother', 'en');
        $this->name_Mother_ar = $ff->mother->getTranslation('name_Mother', 'ar');
        $this->job_Mother = $ff->mother->getTranslation('job_Mother', 'ar');
        $this->job_Mother_en = $ff->mother->getTranslation('job_Mother', 'en');
        $this->address_Mother = $ff->mother->address_Mother;
        $this->phone_Mother = $ff->mother->phone_mother;
        $this->nationality_Mother_id = $ff->mother->nationalities_Mother_id;
        $this->religion_Mother_id = $ff->mother->religions_Mother_id;
        $this->blood_Type_Mother_id = $ff->mother->type_Bloods_Mother_id;

        $this->currentStep = 1;
        $this->showform = 'yes';
        $this->showEdit = 'yes';

    }
    public function StepSubmit_edit()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'email' => 'required',
                'national_ID_Father' => 'required',
                'passport_ID_Father' => 'required',
                'name_Father_en' => 'required',
                'name_Father_ar' => 'required',
                'address_Father' => 'required',
                'job_Father' => 'required',
                'job_Father_en' => 'required',
                'phone_Father' => 'required',
                'nationality_Father_id' => 'required',
                'religion_Father_id' => 'required',
                'blood_Type_Father_id' => 'required',
            ]);

        } elseif ($this->currentStep == 2) {
            $this->validate([
                'national_ID_Mother' => 'required',
                'passport_ID_Mother' => 'required',
                'name_Mother_en' => 'required',
                'name_Mother_ar' => 'required',
                'job_Mother' => 'required',
                'job_Mother_en' => 'required',
                'address_Mother' => 'required',
                'phone_Mother' => 'required',
                'nationality_Mother_id' => 'required',
                'religion_Mother_id' => 'required',
                'blood_Type_Mother_id' => 'required',
            ]);

        }


        $this->currentStep += 1;
    }
    public function delete($id)
    {
        $parent = Parents::find($id);

        if ($parent) {
            if ($parent->father) {
                $file = $parent->father->national_Id_Father;
                File::deleteDirectory(storage_path('app/parent_att/' . $file));
                $parent->father->delete();
            }

            if ($parent->mother) {
                $parent->mother->delete();
            }

            $parent->delete();
            return redirect()->to('parents/add');
        }

    }
    public function update()
    {
        $update_p = Parents::find($this->id_edit)->father;
        // try {

        $f = $update_p->update([
            // 'national_Id_Father' => $this->national_ID_Father,
            'passport_Id_Father' => $this->passport_ID_Father,
            'name_Father' => [
                'en' => $this->name_Father_en,
                'ar' => $this->name_Father_ar
            ],
            'job_Father' => [
                'en' => $this->job_Father,
                'ar' => $this->job_Father_en
            ],
            'address_Father' => $this->address_Father,

            'phone_Father' => $this->phone_Father,
            'nationalities_Father_id' => $this->nationality_Father_id,
            'religions_Father_id' => $this->religion_Father_id,
            'type_Bloods_Father_id' => $this->blood_Type_Father_id,
        ]);
        $m = Mother::create([
            'national_Id_Mother' => $this->national_ID_Mother,
            'passport_Id_Mother' => $this->passport_ID_Mother,
            'name_Mother' => [
                'en' => $this->name_Mother_en,
                'ar' => $this->name_Mother_ar
            ],
            'job_Mother' => [
                'en' => $this->job_Mother,
                'ar' => $this->job_Mother_en
            ],
            'address_Mother' => $this->address_Mother,
            'phone_mother' => $this->phone_Mother,
            'nationalities_Mother_id' => $this->nationality_Mother_id,
            'religions_Mother_id' => $this->religion_Mother_id,
            'type_Bloods_Mother_id' => $this->blood_Type_Mother_id
        ]);
        // $f_id = Father::where('phone_Father', $this->phone_Father)->first()->id;
        // $m_id = Mother::where('phone_mother', $this->phone_Mother)->first()->id;

        // $parent = Parents::create([
        //     'password' => Hash::make($this->password),
        //     'email' => $this->email,
        //     'fathers_id' => $f_id,
        //     'mothers_id' => $m_id
        // ]);
        // $this->clear();
        $this->message = 'Post successfully updated.';
        $this->currentStep = 1;

        // } catch (Exception $e) {
        //     $this->error_message = trans('parents.error_message');
        //     $this->currentStep = 1;

        // }
    }
}