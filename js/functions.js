/**
 * This js file is to store all the necessary functions such as form validation and so on.
 * @author Seng Kheang (Kheangseng@gmail.com)
 * @version 1.0
 * @since 20.12.2021
 */



/**
 * This function is use for validating the data input by the user.
 * @param {FormData} frm    a form element
 * @returns {boolean} flag  return true if the form is validated, otherwise false
 */
function frm_validation(frm){
    flag = false;    //init
    //---------------------------------

    // alert("trim='"+$.trim(frm.uname.value).length+"'");
    if ($.trim(frm.uname.value).length <= 0){
        frm.uname.focus();        
    }else if ((frm.pwd.value).length <= 0){
        frm.pwd.focus();        
    }else{
        flag = true;
    }
    
    return flag;
}
