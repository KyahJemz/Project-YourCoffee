<?php 
    function CreateAccount($Name, $Username, $Password, $ConfirmPassword, $Connection){
        if(!(empty($Name) || empty($Username) || empty($Password) || empty($ConfirmPassword))){
            if ($Password === $ConfirmPassword) {
                if (!(IsUsernameExist($Username, $Connection))){
                    $sql = "INSERT INTO tbl_accounts (Name, Username, Password) 
                    VALUES ('$Name', '$Username','$Password')";
                    if ($Connection->query($sql) === TRUE) {
                        return [True,'Account created!'];
                    } else {
                        return [False,'Error: '.$Connection->error];
                    }
                } else {
                    return [False,'Username taken!'];
                }   
            } else {
                return [False,'Passwords does not match!'];
            }
        } else {
            return [False,'Empty parameters!'];
        }
    }

    function ValidateAccount($Username, $Password, $Connection){
        if(!(empty($Username) || empty($Password))){
            $sql = "SELECT * FROM tbl_accounts WHERE Username = '$Username'";
            $result = $Connection->query($sql);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if($row['Password'] === $Password) {
                    return [True,'Account validated!'];
                } else {
                    return [False,'Wrong password!'];
                }
            } else {
                return [False,'Username does not exist!'];
            }
        } else {
            return [False,'Empty parameters!'];
        }
    }

    function IsUsernameExist($Username, $Connection){
        if(!(empty($Username))){
            $sql = "SELECT * FROM tbl_accounts WHERE Username = '$Username'";
            $result = $Connection->query($sql);
            if ($result->num_rows == 1) {
                return True;
            } else {
                return False;
            }
        } else {
            return False;
        }
    }

    function GetAllItems($Connection){
        $sql = "SELECT * FROM tbl_items";
        $result = $Connection->query($sql);
        if ($result->num_rows > 0) {
            return [True,$result];
        } else {
            return [False];
        }
    }

    function UploadTransaction($TransactionAccount, $TransactionName, $TransactionAddress, $TransactionTell, $TransactionAmount, $TransactionItems, $Connection) {
        $sql = "INSERT INTO tbl_transactions (TransactionAccount, TransactionName, TransactionAddress, TransactionTell, TransactionAmount, TransactionItems) 
                VALUES ('$TransactionAccount','$TransactionName', '$TransactionAddress', '$TransactionTell', '$TransactionAmount', '$TransactionItems')";
        if ($Connection->query($sql) === TRUE) {
            return [true, 'Transaction uploaded successfully!'];
        } else {
            return [false, 'Error: ' . $Connection->error];
        }
    }

    function GetMyTransactions($TransactionAccount,$Connection) {
        $sql = "SELECT * FROM tbl_transactions WHERE TransactionAccount = '$TransactionAccount'";
        $result = $Connection->query($sql);
        if ($result->num_rows > 0) {
            return [True,$result];
        } else {
            return [False];
        }
    }

    function UploadMessage($MessageName, $MessageEmail, $MessageContent, $Connection) {
        $sql = "INSERT INTO tbl_messages (MessageName, MessageEmail, MessageContent) 
                VALUES ('$MessageName','$MessageEmail', '$MessageContent')";
        if ($Connection->query($sql) === TRUE) {
            return [true, 'Message uploaded successfully!'];
        } else {
            return [false, 'Error: ' . $Connection->error];
        }
    }


