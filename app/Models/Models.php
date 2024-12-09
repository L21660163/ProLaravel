<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonDepartment extends Model
{
    use HasFactory;

    protected $table = 'person_departments';
    protected $fillable = ['name', 'active'];
}

class PersonPermission extends Model
{
    use HasFactory;

    protected $table = 'person_permissions';
    protected $fillable = ['name', 'active'];
}

class ResidenceAdviserType extends Model
{
    use HasFactory;

    protected $table = 'residence_adviser_types';
    protected $fillable = ['nombre', 'active'];
}

class ResidenceAmbit extends Model
{
    use HasFactory;

    protected $table = 'residence_ambits';
    protected $fillable = ['nombre', 'active'];
}

class ResidenceCommentType extends Model
{
    use HasFactory;

    protected $table = 'residence_comment_types';
    protected $fillable = ['nombre', 'active'];
}

class ResidenceDictum extends Model
{
    use HasFactory;

    protected $table = 'residence_dictums';
    protected $fillable = ['nombre', 'active'];
}

class ResidenceDocument extends Model
{
    use HasFactory;

    protected $table = 'residence_documents';
    protected $fillable = ['name', 'active'];
}

class ResidenceFileDictum extends Model
{
    use HasFactory;

    protected $table = 'residence_file_dictums';
    protected $fillable = ['nombre', 'active'];
}

class ResidenceFileType extends Model
{
    use HasFactory;

    protected $table = 'residence_file_types';
    protected $fillable = ['nombre', 'active'];
}

class ResidenceKind extends Model
{
    use HasFactory;

    protected $table = 'residence_kinds';
    protected $fillable = ['nombre', 'active'];
}

class ResidenceNature extends Model
{
    use HasFactory;

    protected $table = 'residence_natures';
    protected $fillable = ['nombre', 'active'];
}

class ResidenceProjectPhase extends Model
{
    use HasFactory;

    protected $table = 'residence_project_phases';
    protected $fillable = ['nombre', 'active'];
}

class ResidenceProjectType extends Model
{
    use HasFactory;

    protected $table = 'residence_project_types';
    protected $fillable = ['nombre', 'active'];
}

class ResidenceSector extends Model
{
    use HasFactory;

    protected $table = 'residence_sectors';
    protected $fillable = ['nombre', 'active'];
}
