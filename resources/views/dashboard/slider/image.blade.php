<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                      
                                                            <div class="carousel-item  active ">
                                                                <img src="{{asset($slider->file_name)}}" class="d-block w-100" alt="...">
                                                            </div>
                                                       
                                                    </div>
                                                   
                                                   
                                                </div>
                                                <div class="mt-1">
                                                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#fullscreenModal_{{ $slider->id }}">
                                                        <i class="fa fa-expand"></i> Fullscreen
                                                    </button>
                                                </div>









<div class="modal fade" id="fullscreenModal_{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="fullscreenModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="fullscreenModalLabel">Fullscreen View</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="fullscreenCarousel" class="carousel slide" data-ride="carousel">
                                                                    <div class="carousel-inner">
                                                                       
                                                                            <div class="carousel-item active">
                                                                                <img src="{{ asset($slider->file_name) }}" class="d-block w-100" alt="Fullscreen Image">
                                                                            </div>
                                                                      
                                                                    </div>
                                                                    {{-- <a class="carousel-control-prev" href="#fullscreenCarousel" role="button" data-slide="prev">
                                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                        <span class="sr-only">Previous</span>
                                                                    </a>
                                                                    <a class="carousel-control-next" href="#fullscreenCarousel" role="button" data-slide="next">
                                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                        <span class="sr-only">Next</span>
                                                                    </a> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>