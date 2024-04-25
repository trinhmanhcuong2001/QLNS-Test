<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Task;

class TasksExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Task::join('people', 'tasks.person_id', '=', 'people.id')->join('projects', 'tasks.project_id', '=', 'projects.id')
        ->select('tasks.name', 'tasks.description', 'tasks.start_time', 'tasks.end_time', 'tasks.priority', 'tasks.status', 'people.full_name as person_name', 'projects.name as project_name')
        ->get();
    }

    public function headings(): array
    {
        return [
            'Tên', 'Mô tả', 'Thời gian bắt đầu', 'Thời gian kết thúc', 'Mức', 'Trạng thái', 'Người làm', 'Dự án'
        ];
    }
}
