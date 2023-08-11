<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Danh sách quản trị viên</h4>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản trị viên</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><i class="fa fa-check-circle mr-1"></i>{{ session('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-end mb-2">
                        <button wire:click.prevent="addNew" class="btn btn-outline-success"><i class="fa fa-plus-circle mr-1"></i> Thêm quản trị</button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                     <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="" wire:click.prevent="edit({{ $user }})">
                                                <i class="fa fa-edit mr-2"></i>
                                            </a>

                                            <a href="" wire:click.prevent="confirmUserRemoval({{ $user->id }})">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateUser' : 'createUser' }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            @if($showEditModal)
                                <span>Sửa quản trị viên</span>
                            @else
                                <span>Thêm quản trị viên</span>
                            @endif
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Họ tên</label>
                                <input type="text" wire:model.defer="state.name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="emailHelp" placeholder="Họ tên quản trị viên">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" wire:model.defer="state.email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Nhập vào email quản trị viên">
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" wire:model.defer="state.password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Mật khẩu quản trị viên">
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="paswordConfirmation">Xác nhận mật khẩu</label>
                                <input type="password" wire:model.defer="state.password_confirmation" class="form-control" id="pasword_confirmation" placeholder="Xác nhận mật khẩu">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Huỷ</button>
                        <button type="submit" class="btn btn-outline-success"><i class="fa fa-save mr-1"></i>
                            @if($showEditModal)
                                <span>Sửa</span>
                            @else
                                <span>Thêm</span>
                            @endif
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Xoá quản trị viên</h5>
                </div>

                <div class="modal-body">
                    <h4>Bạn có chắc muốn xoá quản trị viên này</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Huỷ</button>
                    <button type="button" wire:click.prevent="deleteUser" class="btn btn-outline-danger"><i class="fa fa-trash mr-1"></i>Xoá quản trị</button>
                </div>
            </div>
        </div>
    </div>
</div>

