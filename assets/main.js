function check_field(){
    if(document.form.name.value=="" || 
        document.form.name.value.length < 4){
        swal("Atenção!", "O campo nome precisa ser preenchido corretamente.", "info");
        document.form.name.focus();
        return false;
    }
    if(document.form.age.value== "" || 
        document.form.age.value.length < 2){
        swal("Atenção!", "O campo idade precisa ser preenchido corretamente.", "info");
        document.form.age.focus();
        return false;
    }
}

