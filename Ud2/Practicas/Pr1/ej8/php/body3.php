<body>

    <header>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="navId" role="tablist">
            <li class="nav-item">
                <a href="#tab1Id" class="nav-link active" data-bs-toggle="tab" aria-current="page">Active</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#tab2Id">Action</a>
                    <a class="dropdown-item" href="#tab3Id">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#tab4Id">Action</a>
                </div>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#tab5Id" class="nav-link" data-bs-toggle="tab">Another link</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#" class="nav-link disabled" data-bs-toggle="tab">Disabled</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab1Id" role="tabpanel"></div>
            <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
            <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
            <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
            <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
        </div>

    </header>




    <div class="container px-4 py-5" id="custom-cards">
        <h2 class="pb-2 border-bottom">Custom cards</h2>

        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('https://w0.peakpx.com/wallpaper/784/610/HD-wallpaper-little-dog-aesthetic-aesthetic-animals-cute-dog-famous-golden-little-dog-love-popular-puppy.jpg'); background-repeat: no-repeat; background-position: center center; background-size: cover;">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto">
                                <img src="https://p.favim.com/orig/2018/11/24/beautiful-cute-aesthetic-Favim.com-6608994.jpg" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                            </li>
                            <li class="d-flex align-items-center me-3">
                                <svg class="bi me-2" width="1em" height="1em">
                                    <use xlink:href="#geo-fill" />
                                </svg>
                                <small>Earth</small>
                            </li>
                            <li class="d-flex align-items-center">
                                <svg class="bi me-2" width="1em" height="1em">
                                    <use xlink:href="#calendar3" />
                                </svg>
                                <small>3d</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('https://wallpaperaccess.com/full/7005224.jpg'); background-repeat: no-repeat; background-position: center center; background-size: cover;">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Much longer title that wraps to multiple lines</h2>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto">
                                <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                            </li>
                            <li class="d-flex align-items-center me-3">
                                <svg class="bi me-2" width="1em" height="1em">
                                    <use xlink:href="#geo-fill" />
                                </svg>
                                <small>Pakistan</small>
                            </li>
                            <li class="d-flex align-items-center">
                                <svg class="bi me-2" width="1em" height="1em">
                                    <use xlink:href="#calendar3" />
                                </svg>
                                <small>4d</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('https://i.pinimg.com/originals/29/95/d1/2995d1b6d451cae63fb7fb63984575e9.jpg'); background-repeat: no-repeat; background-position: center center; background-size: cover;">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">

                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto">
                                <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                            </li>
                            <li class="d-flex align-items-center me-3">
                                <svg class="bi me-2" width="1em" height="1em">
                                    <use xlink:href="#geo-fill" />
                                </svg>
                                <small>California</small>
                            </li>
                            <li class="d-flex align-items-center">
                                <svg class="bi me-2" width="1em" height="1em">
                                    <use xlink:href="#calendar3" />
                                </svg>
                                <small>5d</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>