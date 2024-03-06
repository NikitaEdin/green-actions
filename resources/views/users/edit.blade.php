<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <!-- Modal -->
     
            <div class="card">
                <div class="card-body">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('updateDetails') }}" method="POST">
                        <div class="modal-body">
                            <!-- Profile edit form -->
                            @csrf

                            {{-- Display name --}}
                            <div class="form-group">
                                <label for="displayname">Display name <span class="text-muted">(visible to
                                        others)</span></label>
                                <input type="text" class="form-control" id="displayname" name="displayname"
                                    placeholder="Enter your display name">
                                @error('displayname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Contact Person name --}}
                            <div class="form-group">
                                <label for="contact">Contact person</label>
                                <input type="text" class="form-control" id="contact" name="contact"
                                    placeholder="Enter your contact person's name">
                            </div>

                            {{-- Telephone number --}}
                            <div class="form-group">
                                <label for="number">Telephone number</label>
                                <input type="tel" class="form-control" id="number" name="number"
                                    placeholder="Enter your telephone number">
                            </div>

                            {{-- Bio --}}
                            <div class="form-group">
                                <label for="bio">Bio <span class="text-muted">(visible to others)</span></label>
                                <textarea class="form-control" id="bio" rows="3" name="bio"
                                    placeholder="Write something about yourself"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
      



    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
