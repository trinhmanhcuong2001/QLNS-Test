const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const company = document.getElementById('exampleInputCompany1');

company.addEventListener('change', ()=> {
    addDepartment();
})
document.addEventListener('DOMContentLoaded', () => {
    addDepartment();
});

function addDepartment(){
    var companyId = company.value;
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
        alert('Đã có lỗi xảy ra');
    })
}