const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const company = document.getElementById('exampleInputCompany1');

// company.addEventListener('change', ()=> {
//     getDepartment();
// })
document.addEventListener('DOMContentLoaded', () => {
    if(document.getElementById('exampleInputParent1')){
        getDepartment();
    }else {
        getPerson();
    }
});

function getDepartment(){
    var companyId = company.value;
    console.log(companyId);
    fetch(url)
    .then(response => response.json())
    .then(data => {
        let options = '<option value="0">Phòng ban cha</option>';
        data.departmentParents.forEach(parent => {
            
           if(parent.parent_id == 0 && parent.company_id == companyId){
                options += '<option value="' + parent.id + '"> ' + parent.name + '</option>';
           } 
           
        });
        document.getElementById('exampleInputParent1').innerHTML = options;
    })
    .catch(error => {
        console.error(error);
        alert('Đã có lỗi xảy ra!');
    })
}

function getPerson(){
    var companyId = company.value;
    fetch(url)
    .then(response => response.json())
    .then(data => {
        let options = '';
        data.people.forEach(person => {
            if(person.company_id == companyId){
                options += '<option value="' + person.id + '">' + person.full_name + '</option>';
            }
        });
        document.getElementById('exampleInputPerson1').innerHTML = options;
    }) 
    .catch(error => {
        console.error(error);
        alert('Đã xảy ra lỗi!');
    });
}