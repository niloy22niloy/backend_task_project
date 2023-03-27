<?php
  
namespace App\Exports;
  
use App\Models\User;
use GuzzleHttp\Psr7\Request;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
  
class UsersExport implements FromQuery, WithHeadings
{
    use Exportable;
   protected $id;
    public function __construct($id)
    {

        
        $this->id =  $id;
        
    }
   

    public function query(){
        return User::whereIn('id',$this->id);
        
    }

    /**
     * Write code on Method
     * 
     *
     * @return response()
     */
    public function headings(): array
    {
        return ['ID', 'Name', 'Email'];
    }
}