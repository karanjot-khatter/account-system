<?php
require_once 'assets/php/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php if (!$verified):?>
                <div class="alert alert-danger text-center mt-2">
                    <strong>Your email is not verified! We've sent you an email verification link, check and verify now</strong>
                </div>
            <?php endif;?>
            <h4 class="text-center text-primary mt-2">Write your notes here</h4>
        </div>
    </div>

    <div class="card border-primary">
        <div class="card-header bg-primary">
            <span style=" vertical-align: middle; font-size: 22px;" class="text-light">All notes</span>
            <a style="float:right" href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addNoteModal"><i class="fas fa-plus-circle fa-lg"></i>&nbsp;Add new note</a>
        </div>
        <div class="card-body" id="showNote">

        </div>
    </div>
</div>

<!--Start Add new note model-->
<div class="modal fade" id="addNoteModal" tabindex="-1" aria-labelledby="addNoteModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style=" background-color: green; color: white;" class="modal-header">
                <h5 class="modal-title">Add New Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="add-note-form">
                    <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                    <textarea name="note" class="form-control mt-2" placeholder="Write your note here" rows="6" required></textarea>
                    <input type="submit" name="addNote" id="addNoteBtn" value="Add Note" class="btn btn-success mt-2">
                </form>
            </div>
        </div>
    </div>
</div>


</div>
<!--End Add new note model-->

<!--Start Edit note model-->
<div class="modal fade" id="editNoteModal" tabindex="-1" aria-labelledby="editNoteModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style=" background-color: blue; color: white;" class="modal-header">
                <h5 class="modal-title">Edit Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="edit-note-form">
                    <input type="hidden" name="id" id="id">
                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title" required>
                    <textarea name="note" id="note" class="form-control mt-2" placeholder="Write your note here" rows="6" required></textarea>
                    <input type="submit" name="editNote" id="editNoteBtn" value="Update Note" class="btn btn-info mt-2">
                </form>
            </div>
        </div>
    </div>
</div>


</div>
<!--End Edit note model-->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(document).ready(function(){

        //add new note ajax request
        $('#addNoteBtn').click(function(e){
            if($('#add-note-form')[0].checkValidity()){
                e.preventDefault();

                $('#addNoteBtn').val('Please wait...');

                $.ajax({

                    url: 'assets/php/process.php',
                    method: 'POST',
                    data: $('#add-note-form').serialize()+'&action=add_note',
                    success: function(response){
                        $('#addNoteBtn').val('Add Note');
                        $('#add-note-form')[0].reset();
                        $('#addNoteModal').modal('hide');

                        Swal.fire({
                            title: 'Note Added successfully!',
                            type: 'success'
                        });

                        displayAllNotes();
                    }

                });
            }
        });

        //Edit note of user Ajax request
        $('body').on('click', '.editBtn', function(e){
            e.preventDefault();
            noteId = $(this).attr('id');

            $.ajax({
                url: 'assets/php/process.php',
                method: 'POST',
                data: {note_id: noteId},
                success:function(response) {
                    data = JSON.parse(response);
                    $('#id').val(data.id);
                    $('#title').val(data.title);
                    $('#note').val(data.note);
                }
            });
        });

        //update note of a user ajax request
        $('#editNoteBtn').click(function(e){
            if($('#edit-note-form')[0].checkValidity()){
                e.preventDefault();

                $.ajax({
                    url: 'assets/php/process.php',
                    method: 'POST',
                    data: $('#edit-note-form').serialize()+'&action=update_note',
                    success:function(response){
                        Swal.fire({
                            title: 'Note updated successfully!',
                            type: 'success'
                        });

                        $('#edit-note-form')[0].reset();
                        $('#editNoteModal').modal('hide');
                        displayAllNotes();

                    }
                });
            }
        });

        //Display all notes of a user
        displayAllNotes();

        function displayAllNotes(){
            $.ajax({
                url: 'assets/php/process.php',
                method: 'POST',
                data: {action: 'display_notes'},
                success:function(response){
                    $('#showNote').html(response);
                    $('table').DataTable({
                        order: [0, 'desc']
                    });

                }
            });
        }
    });
</script>

</body>
</html>