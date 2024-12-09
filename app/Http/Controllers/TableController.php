<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonDepartment;
use App\Models\PersonPermission;
use App\Models\ResidenceAdviserType;
use App\Models\ResidenceAmbit;
use App\Models\ResidenceCommentType;
use App\Models\ResidenceDictum;
use App\Models\ResidenceDocument;
use App\Models\ResidenceFileDictum;
use App\Models\ResidenceFileType;
use App\Models\ResidenceKind;
use App\Models\ResidenceNature;
use App\Models\ResidenceProjectPhase;
use App\Models\ResidenceProjectType;
use App\Models\ResidenceSector;
use App\Models\PersonCareer;
use App\Models\ResidenceCompanies;

class TableController extends Controller
{
    public function getPersonDepartments()
    {
        return PersonDepartment::select('id', 'name')->get();
    }

    public function getPersonPermissions()
    {
        return PersonPermission::select('id', 'name')->get();
    }

    public function getResidenceAdviserTypes()
    {
        return ResidenceAdviserType::select('id', 'nombre as name')->get();
    }

    public function getResidenceAmbits()
    {
        return ResidenceAmbit::select('id', 'nombre as name')->get();
    }

    public function getResidenceCommentTypes()
    {
        return ResidenceCommentType::select('id', 'nombre as name')->get();
    }

    public function getResidenceDictums()
    {
        return ResidenceDictum::select('id', 'nombre as name')->get();
    }

    public function getResidenceDocuments()
    {
        return ResidenceDocument::select('id', 'name')->get();
    }

    public function getResidenceFileDictums()
    {
        return ResidenceFileDictum::select('id', 'nombre as name')->get();
    }

    public function getResidenceFileTypes()
    {
        return ResidenceFileType::select('id', 'nombre as name')->get();
    }

    public function getResidenceKinds()
    {
        return ResidenceKind::select('id', 'nombre as name')->get();
    }

    public function getResidenceNatures()
    {
        return ResidenceNature::select('id', 'nombre as name')->get();
    }

    public function getResidenceProjectPhases()
    {
        return ResidenceProjectPhase::select('id', 'nombre as name')->get();
    }

    public function getResidenceProjectTypes()
    {
        return ResidenceProjectType::select('id', 'nombre as name')->get();
    }

    public function getResidenceSectors()
    {
        return ResidenceSector::select('id', 'nombre as name')->get();
    }


    public function getPersonCareer()
    {
        return PersonCareer::select('id', 'name as name')->get();
    }

    public function getResidenceCompanies()
    {
        return ResidenceCompanies::select('id', 'nombre as name')->get();
    }
}
