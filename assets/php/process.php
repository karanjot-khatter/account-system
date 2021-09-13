<?php
require_once 'session.php';

//ajax request handle new note
if (isset($_POST['action']) && $_POST['action'] == 'add_note')
{
    $title = $cUser->test_input($_POST['title']);
    $note = $cUser->test_input($_POST['note']);

    $cUser->addNewNote($cid, $title, $note);
}

//Handle display all notes of a user
if (isset($_POST['action']) && $_POST['action'] == 'display_notes'){
    $output = '';

    $notes = $cUser->getNotes($cid);

    if ($notes){
        $output .= ' <table class="table text-center">
                <thead>
                    <tr>
                       <th>#</th>
                       <th>Title</th>
                       <th>Note</th>
                       <th>Action</th>
                    </tr>
                </thead>
                <tbody>';
        foreach ($notes as $note){
            $output .= '  <tr>
                        <td>'. $note['id'] . '</td>
                        <td>'. $note['title'] . '</td>
                        <td>'. substr($note['note'], 0, 75) . '...</td>
                        <td>
                            <a href="#" id="'. $note['id'] . '" title="View Details" class="text-success infoBtn"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;
                            <a href="#" id="'. $note['id'] . '" title="Edit Note" class="text-primary editBtn" data-bs-toggle="modal" data-bs-target="#editNoteModal"><i class="fas fa-edit fa-lg"></i></a>&nbsp;
                            <a href="#" id="'. $note['id'] . '" title="Delete Note" class="text-danger deleteBtn"><i class="fas fa-trash fa-lg"></i></a>&nbsp;
                        </td>
                    </tr>
             ';
        }

        $output .= '</tbody>
                </table>';

        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">You have not written any notes yet! Write your first note now</h3>';
    }

}

//Handle Edit note of an user ajax request

if (isset($_POST['note_id'])){
    $id = $_POST['note_id'];
    $note = $cUser->editNote($id);
    echo json_encode($note);
}

//Handle update note of an user ajax request

if (isset($_POST['action']) && $_POST['action'] == 'update_note'){
    $id = $cUser->test_input($_POST['id']);
    $title = $cUser->test_input($_POST['title']);
    $note = $cUser->test_input($_POST['note']);

    $cUser->updateNote($id, $title, $note);
}

//Handle delete a note from user request

if (isset($_POST['del_id'])) {
    $id = $_POST['del_id'];
    $cUser->deleteNote($id);
}

//Handle display a note from user request

if (isset($_POST['info_id'])) {
    $id = $_POST['info_id'];
    $note = $cUser->editNote($id);

    echo json_encode($note);

}

//Handle profile update ajax response
if (isset($_FILES['image'])){
    $name = $cUser->test_input($_POST['name']);
    $gender = $cUser->test_input($_POST['gender']);
    $dob = $cUser->test_input($_POST['dob']);
    $phone = $cUser->test_input($_POST['phone']);
    $oldImage = $_POST['oldImage'];

    $folder = 'uploads/';

    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '' )
    {
        $newImage = $folder.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $newImage);
        if($oldImage != null){
            unlink($oldImage);
        }

    }

    $cUser->updateProfile($name, $gender, $dob, $phone, $newImage, $cid);
}

//handle change password ajax request

if(isset($_POST['action']) && $_POST['action'] == 'change_pass') {
    $currentPass = $_POST['curpass'];
    $newPass = $_POST['newpass'];
    $cnewPass = $_POST['cnewpass'];

    $hnewpass = password_hash($newPass, PASSWORD_DEFAULT);

    if($newPass != $cnewPass) {
        echo $cUser->showMessage('danger', 'Password did not match');
    } else{
        if(password_verify($currentPass, $cpass)){
            $cUser->changePass($hnewpass, $cid);
            echo $cUser->showMessage('success', 'Password changed successfully');
        } else{
            echo $cUser->showMessage('danger', 'Current password is incorrect');
        }
    }

}



?>