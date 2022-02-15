<!-- Sidebar -->
<div class="sidebar">
    <!--
        Tip 1: You can change the background color of the sidebar using: data-background-color="black | dark | blue | purple | light-blue | green | orange | red"
        Tip 2: you can also add an image using data-image attribute
    -->
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav">
                <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="la la-ellipsis-h"></i>
							</span>
                    <h4 class="text-section">Manage User</h4>
                </li>
                @can('manage-permission')
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#permission">
                            <i class="flaticon-layers"></i>
                            <p>Permission</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="permission">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('user-permission.create')}}">
                                        <span class="sub-item">Create</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('user-permission.index')}}">
                                        <span class="sub-item">List</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('manage-role')
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#role">
                            <i class="flaticon-layers"></i>
                            <p>Role</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="role">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('user-role.create')}}">
                                        <span class="sub-item">Create</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('user-role.index')}}">
                                        <span class="sub-item">List</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('manage-user')
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#user">
                            <i class="flaticon-layers"></i>
                            <p>User</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="user">
                            <ul class="nav nav-collapse">
                                @can('manage-user-create')
                                    <li>
                                        <a href="{{route('user.create')}}">
                                            <span class="sub-item">Create</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('manage-user-view')
                                    <li>
                                        <a href="{{route('user.index')}}">
                                            <span class="sub-item">List</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan
                <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="la la-ellipsis-h"></i>
							</span>
                    <h4 class="text-section">Master Date</h4>
                </li>
                @can('manage-service-engineer')
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#base">
                            <i class="flaticon-layers"></i>
                            <p>Service Engineer</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base">
                            <ul class="nav nav-collapse">
                                @can('service-engineer-create')
                                    <li>
                                        <a href="{{route('service-engineer.create')}}">
                                            <span class="sub-item">Create</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('service-engineer-view')
                                    <li>
                                        <a href="{{route('service-engineer.index')}}">
                                            <span class="sub-item">List</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('manage-service-request')
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#forms">
                            <i class="flaticon-agenda-1"></i>
                            <p>Service Request</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="forms">
                            <ul class="nav nav-collapse">
                                @can('service-request-create')
                                    <li>
                                        <a href="{{route('service-request.create')}}">
                                            <span class="sub-item">Create</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('service-request-view')
                                    <li>
                                        <a href="{{route('service-request.index')}}">
                                            <span class="sub-item">List</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('manage-task')
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#task">
                            <i class="flaticon-agenda-1"></i>
                            <p>Task</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="task">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('task.create')}}">
                                        <span class="sub-item">Create</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('task.index')}}">
                                        <span class="sub-item">List</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan

                <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="la la-ellipsis-h"></i>
							</span>
                    <h4 class="text-section">Manage service</h4>
                </li>

                @can('job-create')
                    <li class="nav-item">
                        <a href="{{route('job.create')}}">
                            <i class="flaticon-file-1"></i>
                            <p>Create Job</p>
                        </a>
                    </li>
                @endcan

                @can('manage-job-number-reset')
                    <li class="nav-item">
                        <a href="{{route('job-number.index')}}">
                            <i class="flaticon-file-1"></i>
                            <p>Reset Job Number</p>
                        </a>
                    </li>
                @endcan

                <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="la la-ellipsis-h"></i>
							</span>
                    <h4 class="text-section">Manage Inventory</h4>
                </li>
                @can('manage-item')
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#item">
                            <i class="flaticon-agenda-1"></i>
                            <p>Item</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="item">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('item.create')}}">
                                        <span class="sub-item">Create</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('item.index')}}">
                                        <span class="sub-item">List</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('manage-item-reservation')
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#item-reservation">
                            <i class="flaticon-agenda-1"></i>
                            <p>Item Reservation</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="item-reservation">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('item-reservation.create')}}">
                                        <span class="sub-item">Create</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('item-reservation.index')}}">
                                        <span class="sub-item">List</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan
                <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="la la-ellipsis-h"></i>
							</span>
                    <h4 class="text-section">Report</h4>
                </li>
                @can('manage-report')
                    <li class="nav-item">
                        <a href="{{route('job-report.index')}}">
                            <i class="flaticon-file-1"></i>
                            <p>Job Report</p>
                        </a>
                    </li>
                @endcan

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
