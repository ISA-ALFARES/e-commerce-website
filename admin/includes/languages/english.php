<?php
    function lang($phrase){
        static $lang = array(
            //Start  NavbarPages Page   //
            'HOME'          => "HOME",
            'LOGIN'         => "Login" ,
            'MEMBERS'       => "Members" ,
            'LANGUAGE'       => "Language" ,
            'CATIGORIES'    => "Catigories",
            'DASHBOARD'     => "Dashboard" ,
            'ITEMS'         => "Items" ,
            'COMMENTS'         => "Comments" ,
            'ACCOUNT'          => "my account",
                'EDIT'      => "Edit Profile",
                'VISIT_SHOP'      => "Visit Shop",
                'SITTING'    => "Sittings",
                'LOGOUT'     => "Logout" ,
            'EN' => "EN" ,
            'AR' => "AR" ,
            'TR' => "TR" ,
            //END  NavbarPages Page   //
            //Start  Memper Pages Page   //
            'ADDMEMBER'      => "Add page" ,
            'ADD_ITEMS'   =>  "Add Items" ,
            'EditMemper'     => "Edit Member",
            'INSERTMEMBER'   => "Insert page" ,
            'MANAGEMEMBER'   => "Manage Members" ,
            'MANAGECOMMENTS'   =>  "Manage Comments" ,
            'MANAGE_ITEMS'   =>  "Manage items" ,
            'DELETEMEMBER'   => "Delete Membber" ,
            'UPDATE-MEMBER'  => "Update Member" ,
            'EDIT_COMMENT'   =>  "Edit Comment" ,
            'EDIT_ITEMS'   =>  "Edit Items" ,

            //table
            'ID'               => 'ID',
            'Photo'               => 'Photo',
            'Username'               => 'Username',
            'Email'               => 'Email',
            'Fullname'               => 'Fullname',
            'Date'               => 'Date',
            'Control'               => 'Control',
            'Edit'               => 'Edit',
            'Delete'               => 'Delete',
            'Activate'               => 'Activate',
            'Add Member'               => 'Add Member',
            //table
            //Messages
            'Sorry This page is empty, there is nothing to display...!'               => 'Sorry This page is empty, there is nothing to display...!',
            '    Enter the username...! ' =>   '    Enter the username...! '  ,
            '    Type Your a Password... ' =>   '    Type Your a Password... '  ,
            '      Please Type a valid email' =>   '      Please Type a valid email'  ,
            '      Type your fullname... ' =>   '      Type your fullname... '  ,
            'Save' =>   'Save'  ,
            'Username Cant Be <strong>Empty</strong>..!' =>   'Username Cant Be <strong>Empty</strong>..!'  ,
            'Username Nust  be Lareger Than <strong>3</strong> Characters..!' =>   'Username Nust  be Lareger Than <strong>3</strong> Characters..!'  ,
            'cellnumper Nust be Larger Then <strong>2</strong> Numper..!' =>   'cellnumper Nust be Larger Then <strong>2</strong> Numper..!'  ,
            'The image format is invalid' =>   'The image format is invalid'  ,
            'cellnumper Nust be Larger Then <strong>2</strong> Numper..!' =>   'cellnumper Nust be Larger Then <strong>2</strong> Numper..!'  ,
            'Password Cant Be <strong>Empty</strong>..!' =>   'Password Cant Be <strong>Empty</strong>..!'  ,
            'Fullname Cant Be <strong>Empty</strong>..!' =>   'Fullname Cant Be <strong>Empty</strong>..!'  ,
            'Message Nust be Lareger Then  <strong> 1</strong> Characters..!' =>   'Message Nust be Lareger Then  <strong> 1</strong> Characters..!'  ,
            'Avatar Cant Be <strong>Empty</strong>..!' =>   'Avatar Cant Be <strong>Empty</strong>..!'  ,
            'Image size cannot be greater than <strong>4MB </strong>..!' =>   'Avatar Cant Be <strong>Empty</strong>..!'  ,
            'Record updated...' =>   'Record updated...'  ,
            'You will be redirected to the previous page after seconds ' =>   'You will be redirected to the previous page after seconds '  ,
            '   Type Your New Password... ' =>   '   Type Your New Password... '  ,
            'The deletion was completed successfully...!' =>   'The deletion was completed successfully...!'  ,
            'Activation completed successfully...!' =>   'Activation completed successfully...!'  ,
            'We do not have this user in our records...!' =>   'We do not have this user in our records...!'  ,
            '' =>   ''  ,
            '' =>   ''  ,
            '' =>   ''  ,
            '' =>   ''  ,
            '' =>   ''  ,
            '' =>   ''  ,
            //           END  Memper Pages Page   //
            //           Start  Dashboard Pages Page   //
            'Dashboard' =>   'Dashboard'  ,
            'Latest' =>   'Latest'  ,
            'Registerd Users' =>   'Registerd Users'  ,
            'Total Comments' =>   'Total Comments'  ,
            'Total Items' =>   'Total Items'  ,
            'Pending Members' =>   'Pending Members'  ,
            'Total Members' =>   'Total Members'  ,
            'Activate' =>   'Activate'  ,
            'Edit' =>   'Edit'  ,
            'Items' =>   'Items'  ,
            'Latest' =>   'Latest'  ,
            'Comments' =>   'Comments'  ,
            'There\'s No Comment To Show' =>   'There\'s No Comment To Show'  ,

            //           End  Dashboard Pages Page   //
            //           Start  Categories Pages Page   //
            'Manage Categories' =>   'Manage Categories'  ,
            'Ordering: [' =>   'Ordering: ['  ,
            'desc' =>   'desc'  ,
            'asc' =>   'asc'  ,
            'Edit' =>   'Edit'  ,
            'Delete' =>   'Delete'  ,
            'Ads Disabled' =>   'Ads Disabled'  ,
            'Comment Disabled' =>   'Comment Disabled'  ,
            'Hidden' =>   'Hidden'  ,
            'Delete' =>   'Delete'  ,
            'Ordering number' =>   'Ordering number'  ,
            'Ordering' =>   'Ordering'  ,
            'Description' =>   'Description'  ,
            'Category name' =>   'Category name'  ,
            'Name' =>   'Name'  ,
            'Add New Category' =>   'Add New Category'  ,
            'Sorry This page is empty, there is nothing to display...!' => 'Sorry This page is empty, there is nothing to display...!',
            'Record updated...' => 'Record updated...' ,
            'No' => 'No' ,
            'Yes' => 'Yes' ,
            'Allow Ads' => 'Allow Ads' ,
            'Allow Commenting' => 'Allow Commenting' ,
            'Visibility' => 'Visibility' ,
            'CATIGORIES_CHILD' => 'Categories Child' ,

            'None' => 'None' ,
            '' => '' ,
            //           END  Categories Pages Page   //
            //           Start  Categories Pages Page   //
            'ID' => 'ID' ,
            'Photo' => 'Photo' ,
            'Name' => 'Name' ,
            'Description' => 'Description' ,
            'Price' => 'Price' ,
            'Adding Date' => 'Adding Date' ,
            'Catigore name' => 'Catigore name' ,
            'User name' => 'User name' ,
            'Control' => 'Control' ,
            'Approve' => 'Approve' ,
            '    Enter the Item Name...! ' => '    Enter the Item Name...! ' ,
            '   Description of The Item" ' => '   Description of The Item" ' ,
            '    Enter the Price...! ' => '    Enter the Price...! ' ,
            '    Enter the Country name...! ' => '    Enter the Country name...! ' ,
            'Status' => 'Status' ,
            'New' => 'New' ,
            'Used' => 'Used' ,
            'Like New' => 'Like New' ,
            'Catigore' => 'Catigore' ,
            'Member' => 'Member' ,
            'Save Item' => 'Save Item' ,
            'Update Item' => 'Update Item' ,
            //           End  Categories Pages Page   //
            //           Start  Comments Pages Page   //
            'ID' => 'ID' ,
            'Comment' => 'Comment' ,
            'Item Name' => 'Item Name' ,
            'User Name' => 'User Name' ,
            'Comment_data' => 'Comment_data' ,
            'Control' => 'Control' ,
            'Record updated...' => 'Record updated...' ,
            'Name Can\'t be <sronge>Empty</sronge>' => 'Name Can\'t be <sronge>Empty</sronge>' ,
            'Description Can\'t be <sronge>Empty</sronge>' => 'Description Can\'t be <sronge>Empty</sronge>' ,
            'price Can\'t be <sronge>Empty</sronge>'  => 'price Can\'t be <sronge>Empty</sronge>' ,
            'Status Can\'t be <sronge>Empty</sronge>'  => 'Status Can\'t be <sronge>Empty</sronge>' ,
            'country Can\'t be <sronge>Empty</sronge>' => 'country Can\'t be <sronge>Empty</sronge>' ,
            'CAtigore Can\'t be <sronge>Empty</sronge>'  => 'country Can\'t be <sronge>Empty</sronge>' ,
            'memper Can\'t be <sronge>Empty</sronge>'  => 'memper Can\'t be <sronge>Empty</sronge>' ,
            'Record updated...' => 'Record updated...' ,
            'This user does not exist...!' => 'This user does not exist...!' ,
            'The deletion was completed successfully...!' => 'The deletion was completed successfully...!' ,
            'We do not have this items in our records...!' => 'We do not have this items in our records...!' ,
            'Approve completed successfully...!' => 'Approve completed successfully...!' ,
            'This user does not exist...!' => 'This user does not exist...!' ,
            'Activate' => 'Activate' ,
            'We do not have this user in our records...!' => 'We do not have this user in our records...!' ,
            'Activation completed successfully...!' => 'Activation completed successfully...!' ,
            'This user does not exist...!' => 'This user does not exist...!' ,
            'The deletion was completed successfully...!' => 'The deletion was completed successfully...!' ,

            //           End  Comments Pages Page   //
            //           End  login Pages Page   //
            'log in via' => 'log in via' ,
            'Login' => 'Login' ,
            'Password' => 'Password' ,
            'User name' => 'User name' ,
            '' => '' ,
            //           End  login Pages Page   //
            'Separate Tags With Comma' => 'Tags' ,
            '' => '' ,
            '' => '' ,
            '' => '' ,
            '' => '' ,
            '' => '' ,

        );
        return $lang[$phrase];
    }


