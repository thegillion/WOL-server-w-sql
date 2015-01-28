function setDeleteAction() {
if(confirm("Are you sure want to delete these items?")) {
document.frmUser.action = "delete_user.php";
document.frmUser.submit();
}
}