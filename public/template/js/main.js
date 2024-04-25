const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const company = document.getElementById('exampleInputCompany1');
const project = document.getElementById('exampleInputProject1');

document.addEventListener('DOMContentLoaded', () => {
    if(document.getElementById('exampleInputParent1')){
        getDepartment();
    }
});

function getDepartment(){
    var companyId = company.value;
    if(document.getElementById('parent-id')){
        var parentId = document.getElementById('parent-id').value;
    }
    fetch(url)
    .then(response => response.json())
    .then(data => {
        let options = '<option value="0">Phòng ban cha</option>';
        data.departmentParents.forEach(department => {
            
           if(department.parent_id == 0 && department.company_id == companyId){
                options += '<option value="' + department.id + '" ' + (department.id == parentId ? "selected" : "") +'> ' + department.name + '</option>';
           } 
           
        });
        document.getElementById('exampleInputParent1').innerHTML = options;
    })
    .catch(error => {
        console.error(error);
        alert('Đã có lỗi xảy ra!');
    })
}

function getPersonByCompany(){
    var companyId = company.value;
    fetch(url)
    .then(response => response.json())
    .then(data => {
        let options = '';
        data.people.forEach(person => {
            let isSelected = ''; // Biến để kiểm tra xem person đã được chọn hay chưa
            // Kiểm tra xem person đã được liên kết với project hay không
            if(typeof projectId !== 'undefined'){
                if (person.projects.length > 0) {
                    person.projects.forEach(project => {
                        if (project.id === projectId) {
                            isSelected = 'selected';
                        }
                    });
                }
            }
            if(person.company_id == companyId){
                options += '<option value="' + person.id + '" '+ isSelected +'>' + person.full_name + '</option>';
            }
        });
        document.getElementById('exampleInputPerson1').innerHTML = options;
    }) 
    .catch(error => {
        console.error(error);
        alert('Đã xảy ra lỗi!');
    });
}

function getPersonByProject(id){
    fetch(url + '?project=' + id)
    .then(response => response.json())
    .then(data => {
        let options = '<option>Chọn người làm</option>';
        data.forEach(person => {
            options += `<option value="${person.id}">${person.full_name}</option>`;
        })
        document.getElementById('exampleInputPerson1').innerHTML = options;
        
    })
    .catch(error => {
        console.log(error);
        alert('Xảy ra lỗi!');
    })
}

function getProject(){
    var companyId = company.value;
    fetch(urlProject + '?company=' + companyId)
    .then(response => response.json())
    .then(data => {
        let options2 = '<option value="">Dự án</option>';
        data.projects.forEach(project => {
            options2 += `<option value="${project.id}">${project.name}</option>`;
        })

        document.getElementById('exampleInputProject1').innerHTML = options2;
    })
    .catch(error => {
        console.error(error);
        alert('Có lỗi!');
    })
}