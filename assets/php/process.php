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
                            <a href="#" title="View Details" class="text-success"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;
                            <a href="#" title="Edit Note" class="text-primary" data-bs-toggle="modal" data-bs-target="#editNoteModal"><i class="fas fa-edit fa-lg"></i></a>&nbsp;
                            <a href="#" title="Delete Note" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>&nbsp;
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

?>