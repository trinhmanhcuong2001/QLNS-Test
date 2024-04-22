<?php 

namespace App\Services;

use App\Repositories\ProjectRepository;
use DB;
use Exception;

class ProjectService 
{
    protected $projectRepository;
    public function __construct(ProjectRepository $projectRepository){
        $this->projectRepository = $projectRepository;
    }

    public function all(){
        return $this->projectRepository->all();
    }

    public function create($data){
        DB::beginTransaction();
        try{
            $project = $this->projectRepository->create($data);
            $this->projectRepository->addPersonProject($project->id,$data['person_id']);
            DB::commit();
            return true;

        }catch(Exception $e){
            DB::rollBack();
            session()->flash('error', $e->getMessage());
            return false;
        }
    }

    public function find($id){
        return $this->projectRepository->find($id);
    }

    public function update($id, $data){
        return $this->projectRepository->update($id, $data);
    }

    public function delete($id){
        $this->projectRepository->delete($id);
    }

    public function addPersonProject($project, $person){
        
        try {
            $project = $this->projectRepository->create($project,$person);
        } catch (\Exception $e) {
            //throw $th;
        }
    }

}