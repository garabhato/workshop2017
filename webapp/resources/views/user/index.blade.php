@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
@endsection
@section('menu_task', 'open active')
@section('title', 'Control de Usuarios')
@section('title-description', 'Tabla de Usuarios')
{{ csrf_field() }}
@section('content')

    <section class="section">
        <div class="card">
            <div class="card-content">
                <div class="fresh-datatables">
                    <table id="userTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                        <tr>
                            <td>CI</td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Correo Electronico</td>
                            <td>Usuario</td>
                            <td>Tipo de Usuario</td>
                            <td>Opciones</td>

                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('modal')
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Usuario</h4>
            </div>


            <div class="modal-body">
                <form role="form" id="socio">
                    {{ csrf_field() }}
                    <input type="hidden" name="idpeople" id="idpeople">
                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-5">
                                <h4 class="card-title">
                                    Datos Personales
                                </h4>
                                <label class="control-label">
                                    Carnet de Identidad <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="ci"
                                       id="ciEdit"
                                       type="text"
                                       autocomplete="off"
                                       required>
                            </div>
                            <div class="col-md-1">
                                <label class="control-label">
                                </label>

                            </div>
                            <div class="col-md-5">
                                <h4 class="card-title">
                                    Usuario
                                </h4>
                                <label class="control-label">
                                    Nombre de Usuario <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="username"
                                       id="usernameEdit"
                                       type="text"
                                       autocomplete="off"
                                       required>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label">
                                    Nombre(s) <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="name"
                                       id="nameEdit"
                                       type="text"
                                       autocomplete="off"
                                       required>
                            </div>
                            <div class="col-md-1">
                                <label class="control-label">
                                </label>

                            </div>
                            <div class="col-md-5">
                                <label class="control-label">
                                    Tipo de Usuario <star>*</star>
                                </label>
                                <select class="form-control"  name="userType" id="userTypeEdit">
                                    <option value="" disabled="" selected="">Tipo de Usuario...</option>
                                    <option value="administrador">Administrador</option>
                                    <option value="recepcionista">Recepcionista</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label">
                                    Apellido(s) <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="lastName"
                                       id="lastNameEdit"
                                       type="text"
                                       autocomplete="off"
                                       required>
                            </div>
                            <div class="col-md-1">
                                <label class="control-label">
                                </label>

                            </div>
                            <div class="col-md-5">
                                <label class="control-label">
                                    Correo Electronico <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="email"
                                       id="emailEdit"
                                       type="text"
                                       email="true"
                                       autocomplete="off"
                                       required>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label">
                                    Birthday <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="birthday"
                                       id="birthdayEdit"
                                       type="date"
                                       required
                                       autocomplete="off"
                                />
                            </div>
                            <div class="col-md-1">
                                <label class="control-label">
                                </label>

                            </div>
                            <div class="col-md-5">
                                <!--<label class="control-label">
                                    Contraseña <star>*</star>
                                </label>-->
                                <input class="form-control"
                                       name="password"
                                       id="passwordEdit"
                                       type="hidden"
                                       required
                                       autocomplete="off"
                                />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label">
                                    Telefono/Celular
                                </label>
                                <input class="form-control"
                                       name="phone"
                                       id="phoneEdit"
                                       type="text"
                                       autocomplete="off"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label">
                                    Sexo <star>*</star>
                                </label>
                                <select class="form-control" name="sex" id="sexEdit">
                                    <option value="" disabled="" selected="">Sexo...</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label">
                                    Direccion
                                </label>
                                <input class="form-control"
                                       name="address"
                                       id="addressEdit"
                                       type="text"
                                       autocomplete="off"
                                />
                            </div>
                        </div>


                        <div class="category"><star>*</star> Campos Requeridos</div>
                    </div>

                </form>
            </div>



            <div class="modal-footer">
                <button id="EditUserButton" type="submit" class="btn btn-default btn-group-xs btn-fill">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>

    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/js/paper-dashboard.js?v=1.2.1') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="js/user.js"></script>
    <!--<script src="js/main.js"></script>-->
    <script type="text/javascript">

        $(document).ready(function() {

            $("#myModal form").validate({
                rules: {
                    // simple rule, converted to {required:true}
                    name: {
                        required: true
                    },
                    ci: {
                        required: true,
                        minlength: 5
                    },
                    username: {
                        required: true
                    },
                    lastName: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    birthday: {
                        required: true
                    }
                    // compound rule
                },
                messages: {
                    name: {
                        required: "Ingrese su nombre"
                    },
                    ci: {
                        required: "Ingrese su Carnet de identidad",
                        minlength: "Minimo 5 caracteres"
                    },
                    username: {
                        required: "Ingrese nombre de usuario"
                    },
                    lastName: {
                        required: "Ingrese su apellido"
                    },
                    email: {
                        required: "Ingrese correo electronico"
                    },
                    birthday: {
                        required: "Ingrese fecha de nacimiento"
                    }
                },
                submitHandler: function(form) {

                    $('#myModal').modal('hide');
                    form.submit();
                    return false;
                }
            });

            var table = $('#userTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('api.users.index') }}",
                "columns": [
                    { data: 'ci' },
                    { data: 'name' },
                    { data: 'lastName' },
                    { data: 'email' },
                    { data: 'username' },
                    { data: 'userType' },
                    { defaultContent: "<button class='btn btn-default btn-group-xs btn-fill' data-toggle='modal' data-target='#myModal'><i class='ti ti-marker'></i>Editar</button>" + " "+ "<button class='btn btn-danger btn-group-xs btn-fill ' data-toggle='modal' data-target='#SupplierModalDelete'><i class='ti ti-trash'></i>Eliminar</button>"}
                ],

            });

            $('#userTable tbody').on( 'click', 'button', function () {

                var data = table.row( $(this).parents('tr') ).data();
                $('#idpeople').val(data['idpeople']);
                $('#ciEdit').val(data['ci']);
                $('#nameEdit').val(data['name']);
                $('#lastNameEdit').val(data['lastName']);
                $('#birthdayEdit').val(data['birthday']);
                $('#phoneEdit').val(data['phone']);
                $('#sexEdit').val(data['sex']);
                $('#addressEdit').val(data['address']);
                $('#userTypeEdit').val(data['userType']);
                $('#emailEdit').val(data['email']);
                $('#usernameEdit').val(data['username']);
                $('#passwordEdit').val(data['password']);
            } );
            $('#EditUserButton').click( function () {
                table.ajax.reload();
                $('#myModal').modal('hide');
            } );

        });



    </script>
@endsection