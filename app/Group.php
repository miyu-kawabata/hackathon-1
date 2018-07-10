<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Group extends Model
{
    protected $fillable = [
        'groupname', 'description','date','category','organizer_id'
    ];
    
    public function user_participants()
    {
        return $this->belongsToMany(User::class, 'members', 'group_id', 'user_id');
    }
    
     public function chat()
    {
        return $this->hasMany(Chat::class);
    }
    
<<<<<<< HEAD
     public function favorites()
    {
        return $this->belongsToMany(Group::class, 'favorites_table', 'favorite_id', 'user_id')->withTimestamps();
    }
    


}
=======
     public function organizer()
    {
        return $this->belongsTo(User::class);
    }
    
}
>>>>>>> e3122446fdeda022946c2ce4b884683c956b3547
