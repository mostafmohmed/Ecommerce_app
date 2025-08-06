<div class="content-wrapper">
    <div class="content-body">
        <div class="card email-app-details d-none d-lg-block">
            <div class="card-content">
                <div class="email-app-options card-body d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Reply"><i class="la la-reply"></i></button>
                        <button type="button" class="btn btn-warning" data-toggle="tooltip" title="Report Spam"><i class="ft-alert-octagon"></i></button>
                        <button type="button" class="btn btn-{{ $message->deleted_at == null ? 'danger' : 'success' }} delete" data-id="{{ $message->id }}" data-toggle="tooltip" title="Delete"><i class="ft-trash-2"></i></button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">More</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item mark_unreade" id="unreade-{{ $message->id }}" mark-id="{{ $message->id }}" href="#">Mark as Unread</a>
                           <a class="dropdown-item force_delete" data-id="{{ $message->id }}" href="#">Force Delete</a>

                            <a class="dropdown-item" href="#">Restore</a>
                        </div>
                    </div>
                </div>

                <div class="email-app-title card-body">
                    <h3 class="list-group-item-heading"></h3>
                    <p class="list-group-item-text"><span class="badge badge-primary">Show Message</span></p>
                </div>

                <div class="media-list">
                    <div class="card-header p-0">
                        <div class="email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                            <div class="media-left pr-1">
                                <span class="avatar avatar-md">
                                    <span class="media-object rounded-circle text-circle bg-info">
                                        {{ strtoupper($message->name) }}
                                    </span>
                                </span>
                            </div>
                            <div class="media-body w-100">
                                <h6 class="list-group-item-heading">From: {{ $message->name }}</h6>
                                <p class="list-group-item-text"><span class="float-right text-muted">{{ $message->created_at }}</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="card-collapse collapse show">
                        <div class="card-body">
                            <p>{{ $message->massage }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
