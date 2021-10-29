<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add A New Device</h5>
                <button type="button" class="close" data-dismiss="modal" wire:click="cancel()" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data">
                <div class="row">
                    <h3>Primary Details</h3>
                </div>
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label for="exampleFormControlInput1">* Device Name:</label>
                        <input type="text" class="form-control" wire:model="name" placeholder="Device Name..">
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        </div>

                        <div class="col-lg-6">
                        <div class="form-group">
                        <label for="exampleFormControlInput1">* Category:</label>
                        <select wire:model="show" class="form-control">
                            <option value="0">Select Any Category...</option>
                            @foreach($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="exampleFormControlInput1">* Brand:</label>
                        @if($this->show>'0')
                        <select wire:model="show2" class="form-control">
                            <option value="0">Select Any Category...</option>
                            @foreach($brnds as $brn)
                            <option value="{{$brn->id}}">{{$brn->name}}</option>
                            @endforeach
                        </select>
                        @else
                        <br/>Select A Category To See The Brand List.
                        @endif
                        </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Image:</label>
                            <input type="file" class="form-control" wire:model="img_src">
                            @error('img_src') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Device Price:</label>
                            <input type="text" class="form-control" wire:model="price" placeholder="Device Price..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Device Meta Title:</label>
                            <input type="text" class="form-control" wire:model="metatitle" placeholder="Device Meta Title..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Device Meta Description:</label>
                            <input type="text" class="form-control" wire:model="metades" placeholder="Device Meta Description..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Device Meta Keywords:</label>
                            <input type="text" class="form-control" wire:model="metakey" placeholder="Device Meta Keywords..">
                            </div>
                        </div>
                    </div>

                    <!--phone show-->
                    <div class="row">
                        <h3>Product Page Top Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Device Status:</label>
                            <input type="text" class="form-control" wire:model="status" placeholder="Device Status..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Device Details & Price 1:</label>
                            <input type="text" class="form-control" wire:model="ddp1" placeholder="Device Details & Price 1..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Device Details & Price 2:</label>
                            <input type="text" class="form-control" wire:model="ddp2" placeholder="Device Details & Price 2..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Device Status 2:</label>
                            <input type="text" class="form-control" wire:model="status2" placeholder="Device Status 2..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Device Details & Price 3:</label>
                            <input type="text" class="form-control" wire:model="ddp3" placeholder="Device Details & Price 3..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Device Details & Price 4:</label>
                            <input type="text" class="form-control" wire:model="ddp4" placeholder="Device Details & Price 4..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Device Size:</label>
                            <input type="text" class="form-control" wire:model="ds" placeholder="Device Size..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Device Resoulution:</label>
                            <input type="text" class="form-control" wire:model="dr" placeholder="Device Resolution..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Camera MegaPixel:</label>
                            <input type="text" class="form-control" wire:model="cs" placeholder="Camera Megapixel..">
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Camera Resolution:</label>
                            <input type="text" class="form-control" wire:model="cr" placeholder="Camera Resolution..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Ram Size:</label>
                            <input type="text" class="form-control" wire:model="rs" placeholder="Ram Size..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Ram Type:</label>
                            <input type="text" class="form-control" wire:model="rt" placeholder="Ram Type..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Battery Size:</label>
                            <input type="text" class="form-control" wire:model="bs" placeholder="Battery Size..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Battery Type:</label>
                            <input type="text" class="form-control" wire:model="bt" placeholder="Battery Type..">
                            </div>
                        </div>
                    </div>

                    <!--launch-->
                    <div class="row">
                        <h3>Launch Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Announced:</label>
                            <input type="text" class="form-control" wire:model="ann" placeholder="Announced..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Status:</label>
                            <input type="text" class="form-control" wire:model="sta" placeholder="Status..">
                            </div>
                        </div>
                    </div>

                    <!--body-->
                    <div class="row">
                        <h3>Body Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Dimension:</label>
                            <input type="text" class="form-control" wire:model="dime" placeholder="Dimension..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Weight:</label>
                            <input type="text" class="form-control" wire:model="weight" placeholder="Weight..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Build:</label>
                            <input type="text" class="form-control" wire:model="build" placeholder="Build..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Sim:</label>
                            <input type="text" class="form-control" wire:model="sim" placeholder="Sim..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Sim 2:</label>
                            <input type="text" class="form-control" wire:model="sim2" placeholder="Sim 2..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Sim 3:</label>
                            <input type="text" class="form-control" wire:model="sim3" placeholder="Sim 3..">
                            </div>
                        </div>
                    </div>

                    <!--display-->
                    <div class="row">
                        <h3>Display Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Type:</label>
                            <input type="text" class="form-control" wire:model="type" placeholder="Type..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Size:</label>
                            <input type="text" class="form-control" wire:model="size" placeholder="Size..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Resolution:</label>
                            <input type="text" class="form-control" wire:model="res" placeholder="Resolution..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Protection (1st Line):</label>
                            <input type="text" class="form-control" wire:model="pro1" placeholder="Protection (1st Line)..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Protection (2nd Line):</label>
                            <input type="text" class="form-control" wire:model="pro2" placeholder="Protection (2nd Line)..">
                            </div>
                        </div>
                    </div>

                    <!--platform-->
                    <div class="row">
                        <h3>Platform Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* OS:</label>
                            <input type="text" class="form-control" wire:model="os" placeholder="OS..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Chipset:</label>
                            <input type="text" class="form-control" wire:model="chip" placeholder="Chipset..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Chipset 2:</label>
                            <input type="text" class="form-control" wire:model="c2" placeholder="Chipset 2..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* CPU:</label>
                            <input type="text" class="form-control" wire:model="cpu" placeholder="CPU..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* CPU:</label>
                            <input type="text" class="form-control" wire:model="cp2" placeholder="CPU 2..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* GPU:</label>
                            <input type="text" class="form-control" wire:model="gpu" placeholder="GPU..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* GPU 2:</label>
                            <input type="text" class="form-control" wire:model="gp2" placeholder="GPU 2..">
                            </div>
                        </div>
                    </div>
                    <!--memory-->
                    <div class="row">
                        <h3>Memory Details</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Card Slot:</label>
                            <input type="text" class="form-control" wire:model="slot" placeholder="Card Slot..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Internal (1st Line):</label>
                            <input type="text" class="form-control" wire:model="intr1" placeholder="Internal (1st Line)..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Internal (2nd Line):</label>
                            <input type="text" class="form-control" wire:model="intr2" placeholder="Internal (2nd Line)....">
                            </div>
                        </div>
                    </div>

                    <!--camera-->
                    <div class="row">
                        <h3>Main Camera Details</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Camera Number:</label>
                            <input type="text" class="form-control" wire:model="cn1" placeholder="Camera Number..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Camera 1:</label>
                            <input type="text" class="form-control" wire:model="cam1" placeholder="Camera 1..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Camera 2:</label>
                            <input type="text" class="form-control" wire:model="cam2" placeholder="Camera 2..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Camera 3:</label>
                            <input type="text" class="form-control" wire:model="cam3" placeholder="Camera 3..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Camera 4:</label>
                            <input type="text" class="form-control" wire:model="cam4" placeholder="Camera 4..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Camera 5:</label>
                            <input type="text" class="form-control" wire:model="cam5" placeholder="Camera 5..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Camera 6:</label>
                            <input type="text" class="form-control" wire:model="cam6" placeholder="Camera 6..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Features:</label>
                            <input type="text" class="form-control" wire:model="feat1" placeholder="Features..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Video:</label>
                            <input type="text" class="form-control" wire:model="vid1" placeholder="Video..">
                            </div>
                        </div>
                    </div>

                    <!--selfie camera-->
                    <div class="row">
                        <h3>Selfie Camera Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Camera Number:</label>
                            <input type="text" class="form-control" wire:model="cn11" placeholder="Camera Number..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Camera 1:</label>
                            <input type="text" class="form-control" wire:model="cam11" placeholder="Camera 1..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Camera 2:</label>
                            <input type="text" class="form-control" wire:model="cam12" placeholder="Camera 2..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Camera 3:</label>
                            <input type="text" class="form-control" wire:model="cam13" placeholder="Camera 3..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Camera 4:</label>
                            <input type="text" class="form-control" wire:model="cam14" placeholder="Camera 4..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Camera 5:</label>
                            <input type="text" class="form-control" wire:model="cam15" placeholder="Camera 5..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Camera 6:</label>
                            <input type="text" class="form-control" wire:model="cam16" placeholder="Camera 6..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Features:</label>
                            <input type="text" class="form-control" wire:model="feat11" placeholder="Features..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Video:</label>
                            <input type="text" class="form-control" wire:model="vid11" placeholder="Video..">
                            </div>
                        </div>
                    </div>

                    <!--keyboard-->
                    <div class="row">
                        <h3>Keyboard Details</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Details 1:</label>
                            <input type="text" class="form-control" wire:model="d1" placeholder="Details 1..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Details 2:</label>
                            <input type="text" class="form-control" wire:model="d2" placeholder="Details 2..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Details 3:</label>
                            <input type="text" class="form-control" wire:model="d3" placeholder="Details 3..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Details 4:</label>
                            <input type="text" class="form-control" wire:model="d4" placeholder="Details 4..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Details 5</label>
                            <input type="text" class="form-control" wire:model="d5" placeholder="Details 5..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Details 6:</label>
                            <input type="text" class="form-control" wire:model="d6" placeholder="Details 6..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Details 7:</label>
                            <input type="text" class="form-control" wire:model="d7" placeholder="Details 7..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Details 8:</label>
                            <input type="text" class="form-control" wire:model="d8" placeholder="Details 8..">
                            </div>
                        </div>
                    </div>

                    <!--keycap-->
                    <div class="row">
                        <h3>Key Cap Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Type:</label>
                            <input type="text" class="form-control" wire:model="ty1" placeholder="Type..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Size:</label>
                            <input type="text" class="form-control" wire:model="si1" placeholder="Size..">
                            </div>
                        </div>
                    </div>

                    <!--keyswitch-->
                    <div class="row">
                        <h3>Key Switch Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Type:</label>
                            <input type="text" class="form-control" wire:model="ty2" placeholder="Type..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Size:</label>
                            <input type="text" class="form-control" wire:model="si2" placeholder="Size..">
                            </div>
                        </div>
                    </div>

                    <!--general-->
                    <div class="row">
                        <h3>General Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Type:</label>
                            <input type="text" class="form-control" wire:model="tp" placeholder="Type..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Driver Unit:</label>
                            <input type="text" class="form-control" wire:model="un" placeholder="Driver Unit..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Magnet:</label>
                            <input type="text" class="form-control" wire:model="mgn" placeholder="Magnet..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Diaphragm:</label>
                            <input type="text" class="form-control" wire:model="dia" placeholder="Diaphragm..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* FR:</label>
                            <input type="text" class="form-control" wire:model="fr" placeholder="FR..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* FR (Active Operation):</label>
                            <input type="text" class="form-control" wire:model="fra" placeholder="FR (Active Operation)..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* FR (Bluetooth):</label>
                            <input type="text" class="form-control" wire:model="frb" placeholder="FR (Bluetooth)..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Sensitivities:</label>
                            <input type="text" class="form-control" wire:model="sens" placeholder="Sensitivities..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Cord Type:</label>
                            <input type="text" class="form-control" wire:model="ct" placeholder="Cord Type..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Cord Length:</label>
                            <input type="text" class="form-control" wire:model="cl" placeholder="Cord Length..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Plug:</label>
                            <input type="text" class="form-control" wire:model="plug" placeholder="Plug..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Wearing Style:</label>
                            <input type="text" class="form-control" wire:model="style" placeholder="Wearing Style..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* NFC:</label>
                            <input type="text" class="form-control" wire:model="nfc" placeholder="NFC..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* DSEE Extreme:</label>
                            <input type="text" class="form-control" wire:model="dsee" placeholder="DSEE Extreme..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Passive Operation:</label>
                            <input type="text" class="form-control" wire:model="passive" placeholder="Passive Operation..">
                            </div>
                        </div>
                    </div>

                    <!--battery-->
                    <div class="row">
                        <h3>Battery Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Type:</label>
                            <input type="text" class="form-control" wire:model="btyp" placeholder="Type..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Charging:</label>
                            <input type="text" class="form-control" wire:model="charging" placeholder="Charging..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Charging 2:</label>
                            <input type="text" class="form-control" wire:model="ch2" placeholder="Charging..">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Charging 3:</label>
                            <input type="text" class="form-control" wire:model="ch3" placeholder="Charging..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Continuos Music:</label>
                            <input type="text" class="form-control" wire:model="msc" placeholder="Continuos Music..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Waiting Time:</label>
                            <input type="text" class="form-control" wire:model="wtime" placeholder="Waiting Time..">
                            </div>
                        </div>
                    </div>

                    <!--bluetooth-->
                    <div class="row">
                        <h3>Bluetooth Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Version:</label>
                            <input type="text" class="form-control" wire:model="vers" placeholder="Version..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Effective Range:</label>
                            <input type="text" class="form-control" wire:model="erange" placeholder="Effective Range..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Frequency Range:</label>
                            <input type="text" class="form-control" wire:model="frange" placeholder="Frequency Range..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Profile:</label>
                            <input type="text" class="form-control" wire:model="prof" placeholder="Profile..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Formats:</label>
                            <input type="text" class="form-control" wire:model="formats" placeholder="Formats..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Content Protection:</label>
                            <input type="text" class="form-control" wire:model="contprot" placeholder="Content Protection..">
                            </div>
                        </div>
                    </div>

                    <!--anc-->
                    <div class="row">
                        <h3>ANC Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* On/Off Switch:</label>
                            <input type="text" class="form-control" wire:model="swtch" placeholder="On/Off Switch..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* NC Optimizer:</label>
                            <input type="text" class="form-control" wire:model="nco" placeholder="NC Optimizer..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Atmospheric:</label>
                            <input type="text" class="form-control" wire:model="atm" placeholder="Atmospheric..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Ambient Sound:</label>
                            <input type="text" class="form-control" wire:model="amb" placeholder="Ambient Sound..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Quick Attention:</label>
                            <input type="text" class="form-control" wire:model="qa" placeholder="Quick Attention..">
                            </div>
                        </div>
                    </div>

                    <!--control-->
                    <div class="row">
                        <h3>Control Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Control:</label>
                            <input type="text" class="form-control" wire:model="contrl" placeholder="Control..">
                            </div>
                        </div>
                    </div>

                    <!--transmitters-->
                    <div class="row">
                        <h3>Transmitter Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Input(s):</label>
                            <input type="text" class="form-control" wire:model="inp" placeholder="Input(s)..">
                            </div>
                        </div>
                    </div>

                    <!--sound-->
                    <div class="row">
                        <h3>Sound Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Loudspeakers:</label>
                            <input type="text" class="form-control" wire:model="loud" placeholder="Loudspeakers..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* 3.55mm Jack:</label>
                            <input type="text" class="form-control" wire:model="jack" placeholder="3.55mm Jack..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* 3.55mm Jack 2:</label>
                            <input type="text" class="form-control" wire:model="j2" placeholder="3.55mm Jack..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* 3.55mm Jack 3:</label>
                            <input type="text" class="form-control" wire:model="j3" placeholder="3.55mm Jack..">
                            </div>
                        </div>
                    </div>

                    <!--comms-->
                    <div class="row">
                        <h3>Comms Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* WLAN:</label>
                            <input type="text" class="form-control" wire:model="wlan" placeholder="WLAN..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Bluetooth:</label>
                            <input type="text" class="form-control" wire:model="btth" placeholder="Bluetooth..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* GPS:</label>
                            <input type="text" class="form-control" wire:model="gps" placeholder="GPS..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* NFC:</label>
                            <input type="text" class="form-control" wire:model="nfcc" placeholder="NFC..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Radio:</label>
                            <input type="text" class="form-control" wire:model="radio" placeholder="Radio..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* USB:</label>
                            <input type="text" class="form-control" wire:model="usb" placeholder="USB..">
                            </div>
                        </div>
                    </div>

                    <!--features-->
                    <div class="row">
                        <h3>Features Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Sensors:</label>
                            <input type="text" class="form-control" wire:model="sensors" placeholder="Sensors..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Sensors 2:</label>
                            <input type="text" class="form-control" wire:model="sn2" placeholder="Sensors 2..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Sensors 3:</label>
                            <input type="text" class="form-control" wire:model="sn3" placeholder="Sensors 3..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Sensors 4:</label>
                            <input type="text" class="form-control" wire:model="sn4" placeholder="Sensors 4..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Sensors 5:</label>
                            <input type="text" class="form-control" wire:model="sn5" placeholder="Sensors 5..">
                            </div>
                        </div>
                    </div>

                    <!--misc-->
                    <div class="row">
                        <h3>MISC Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Colors:</label>
                            <input type="text" class="form-control" wire:model="clrs" placeholder="Colors..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Models:</label>
                            <input type="text" class="form-control" wire:model="mdls" placeholder="Models..">
                            </div>
                        </div>
                    </div>

                    <!--network-->
                    <div class="row">
                        <h3>Network Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Technology:</label>
                            <input type="text" class="form-control" wire:model="tech" placeholder="Technology..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* 2G:</label>
                            <input type="text" class="form-control" wire:model="tg" placeholder="2G..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* 3G:</label>
                            <input type="text" class="form-control" wire:model="thg" placeholder="3G..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* 4G:</label>
                            <input type="text" class="form-control" wire:model="fg" placeholder="4G..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* 5G:</label>
                            <input type="text" class="form-control" wire:model="fvg" placeholder="5G..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Speed:</label>
                            <input type="text" class="form-control" wire:model="speed" placeholder="Speed..">
                            </div>
                        </div>
                    </div>

                    <!--tests-->
                    <div class="row">
                        <h3>Tests Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Performance 1:</label>
                            <input type="text" class="form-control" wire:model="pr1" placeholder="Performance 1..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Performance 2:</label>
                            <input type="text" class="form-control" wire:model="pr2" placeholder="Performance 2..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Performance 3:</label>
                            <input type="text" class="form-control" wire:model="pr3" placeholder="Performance 3..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Performance 4:</label>
                            <input type="text" class="form-control" wire:model="pr4" placeholder="Performance 4..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Performance 5:</label>
                            <input type="text" class="form-control" wire:model="pr5" placeholder="Performance 5..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Display:</label>
                            <input type="text" class="form-control" wire:model="disp" placeholder="Display..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Camera:</label>
                            <input type="text" class="form-control" wire:model="cam" placeholder="Camera..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Loudspeaker:</label>
                            <input type="text" class="form-control" wire:model="louds" placeholder="Loudspeaker..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Battery Life:</label>
                            <input type="text" class="form-control" wire:model="btl" placeholder="Battery Life..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <h3>Shop Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Variant 1:</label>
                            <input type="text" class="form-control" wire:model="vr1" placeholder="Variant 1..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 1 Image:</label>
                            <input type="file" class="form-control" wire:model="vrspc1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 1 Price:</label>
                            <input type="text" class="form-control" wire:model="vrsp1" placeholder="Shop 1 Price..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 1 Link:</label>
                            <input type="text" class="form-control" wire:model="vrsl1" placeholder="Shop 1 Link..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 2 Image:</label>
                            <input type="file" class="form-control" wire:model="vrspc2">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 2 Price:</label>
                            <input type="text" class="form-control" wire:model="vrsp2" placeholder="Shop 2 Price..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 2 Link:</label>
                            <input type="text" class="form-control" wire:model="vrsl2" placeholder="Shop 2 Link..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Variant 2:</label>
                            <input type="text" class="form-control" wire:model="vr2" placeholder="Variant 2..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 1 Image:</label>
                            <input type="file" class="form-control" wire:model="vrspc21">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 1 Price:</label>
                            <input type="text" class="form-control" wire:model="vrsp21" placeholder="Shop 1 Price..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 1 Link:</label>
                            <input type="text" class="form-control" wire:model="vrsl21" placeholder="Shop 1 Link..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 2 Image:</label>
                            <input type="file" class="form-control" wire:model="vrspc22">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 2 Price:</label>
                            <input type="text" class="form-control" wire:model="vrsp22" placeholder="Shop 2 Price..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 2 Link:</label>
                            <input type="text" class="form-control" wire:model="vrsl22" placeholder="Shop 2 Link..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Variant 3:</label>
                            <input type="text" class="form-control" wire:model="vr3" placeholder="Variant 3..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 1 Image:</label>
                            <input type="file" class="form-control" wire:model="vrspc31">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 1 Price:</label>
                            <input type="text" class="form-control" wire:model="vrsp31" placeholder="Shop 1 Price..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 1 Link:</label>
                            <input type="text" class="form-control" wire:model="vrsl31" placeholder="Shop 1 Link..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 2 Image:</label>
                            <input type="file" class="form-control" wire:model="vrspc32">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 2 Price:</label>
                            <input type="text" class="form-control" wire:model="vrsp32" placeholder="Shop 2 Price..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 2 Link:</label>
                            <input type="text" class="form-control" wire:model="vrsl32" placeholder="Shop 2 Link..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Variant 4:</label>
                            <input type="text" class="form-control" wire:model="vr4" placeholder="Variant 1..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 1 Image:</label>
                            <input type="file" class="form-control" wire:model="vrspc41">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 1 Price:</label>
                            <input type="text" class="form-control" wire:model="vrsp41" placeholder="Shop 1 Price..">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 1 Link:</label>
                            <input type="text" class="form-control" wire:model="vrsl41" placeholder="Shop 1 Link..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 2 Image:</label>
                            <input type="file" class="form-control" wire:model="vrspc42">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 2 Price:</label>
                            <input type="text" class="form-control" wire:model="vrsp42" placeholder="Shop 2 Price..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Shop 2 Link:</label>
                            <input type="text" class="form-control" wire:model="vrsl42" placeholder="Shop 2 Link..">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <h3>Video Details</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">* Video Link:</label>
                            <input type="text" class="form-control" wire:model="vdlnk" placeholder="Video Link..">
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary" data-dismiss="modal">Create Device</button>
            </div>
       </div>
    </div>
</div>