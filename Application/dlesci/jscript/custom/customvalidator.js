function validate_exam(){
                var txtField = new Array();
                txtField[0] = document.createExamF.examName.value;
                txtField[1] = document.createExamF.noQperPaper.value;
                txtField[2] = document.createExamF.noOfQs.value;
                txtField[3] = document.createExamF.duration.value;
                txtField[4] = document.createExamF.startTime.value;
                txtField[5] = document.createExamF.endTime.value;

                if(txtField[0] == "" || txtField[0] == null){
                        alert("Please Enter all the fields");
                        document.createExamF.examName.focus();
                        return false;
                } else if(txtField[1] == "" || txtField[1] == null){
                        alert("Please Enter all the fields");
                        document.createExamF.noQperPaper.focus();
                        return false;
                } if(txtField[2] == "" || txtField[2] == null){
                        alert("Please Enter all the fields");
                        document.createExamF.noOfQs.focus();
                        return false;
                } if(txtField[3] == "" || txtField[3] == null){
                        alert("Please Enter all the fields");
                        document.createExamF.duration.focus();
                        return false;
                } if(txtField[4] == "" || txtField[4] == null){
                        alert("Please Enter all the fields");
                        document.createExamF.startTime.focus();
                        return false;
                } if(txtField[5] == "" || txtField[5] == null){
                        alert("Please Enter all the fields");
                        document.createExamF.endTime.focus();
                        return false;
                } else
                    return true;
            }