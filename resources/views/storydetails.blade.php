@extends('layouts.app')
@section('title')
    Story Details
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-6 mt-5">
                <img src="{{ asset('iamges/growsharestory.png') }}" alt="">
                <img class="d-block w-100 h-100" src="images/Image2.png" class="img-fluid" alt="First slide">

            </div>
            <div class="col-xl-6 mt-5">
                <div class="row">
                    <div class="d-flex justify-content-start">
                        <img class="rounded-circle px-2 ms-3 mb-2 " id="header-avatar" src="{{ asset('Images/volunteer2.png') }}"
                            alt="Profile" >

                    </div>
                    <div class="col-xl-12">
                        <span class="ms-4 px-2" id="userAvatar">Aniket Patel </span>

                        <button type="button" class="btn px-2   btn-outline-secondary float-end rounded-pill "><i
                                class="fa fa-eye"></i>&nbsp;12,000 Views</button>
                    </div>

                    <div class="row ms-3 mt-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio natus quia quos laudantium nemo quod
                        fugit illo pariatur voluptatum deleniti corrupti, ex facilis dolorem sint qui labore nulla autem
                        eveniet.<br><br>
                        Itaque id culpa doloremque. Veritatis aliquid nihil enim error sit ad, minima, ab distinctio neque
                        impedit eaque inventore nesciunt qui dolorem nam, laborum eum veniam quos eligendi sunt soluta
                        sapiente!<br><br>
                        Amet nesciunt quasi ut debitis sit soluta qui quia ipsum quidem laboriosam sequi obcaecati dolores
                        animi, sapiente tempore nulla eligendi temporibus fugit possimus aliquam repudiandae cum iure at!
                        Ipsam, vero.
                        <br><br>
                        Fuga optio omnis dolorum laboriosam ullam, cupiditate autem explicabo dolorem. Repudiandae a enim,
                        doloribus ad est voluptatem eos ipsum inventore nihil veritatis eum excepturi quae mollitia
                        reprehenderit eius magnam doloremque.
                        Excepturi similique at asperiores facere porro.
                    </div>
                    <div class="row">
                        <div class=" mt-4">
                            <button type="button" class="btn px-4  ms-5 btn-outline-secondary  rounded-pill "><i
                                    class="fa fa-square"></i>&nbsp;Recommend to a Co-Worker</button>
                            <button type="button" id="story_save"
                                class="btn px-4 btn-outline-warning rounded-pill ms-3">Open Mission&nbsp;<i
                                    class="fa fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-12">
            <ul class="nav nav-tabs mt-3 px-2" id="myTab" role="tablist">
                <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button" role="tab"
                    aria-controls="home" aria-selected="flase"
                    style="border:none; border-bottom: 2px solid #5c5c5c;
                    color: #474747;
                    font-weight: 500; font-family: Roboto; font-size:large" >Grow
                    Trees- On the path to environment Sustainbility
                </a>
            </ul>
            <div class="row mt-3">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas enim, quo voluptatibus commodi obcaecati
                    perspiciatis dolor mollitia necessitatibus eligendi odio vero quia cumque labore nemo tenetur laborum
                    blanditiis? Cum, at?
                    Fugit nam eligendi voluptates iusto, facilis quos est quibusdam cupiditate natus ut voluptatibus!
                    Aliquam quidem qui illum ducimus officia, molestias dicta maxime nesciunt! Corrupti soluta consequuntur
                    dolore porro, error officiis.<br><br>
                    Pariatur, perferendis facilis! Quo illo alias doloribus, officiis maxime praesentium fugiat suscipit
                    perspiciatis eaque commodi veritatis quia modi aperiam. In cumque porro voluptatibus ducimus nam ratione
                    itaque quia quos unde!
                    Itaque magnam aliquid aliquam. Velit, mollitia! Vel adipisci corrupti quod beatae amet iusto. Optio
                    iure, consectetur, a laudantium reprehenderit culpa repellat numquam delectus doloribus, iusto modi qui
                    eaque atque corporis?<br><br>
                    Error quo accusantium ducimus, neque quaerat sequi rerum temporibus vitae excepturi eligendi vero animi
                    praesentium ratione unde sint cum reprehenderit aut, eius asperiores perspiciatis voluptas dolore earum.
                    Odio, illum beatae.<br><br>
                    Nulla debitis fugit numquam cupiditate. Incidunt culpa, amet nemo accusamus pariatur harum cumque eum ut
                    natus perferendis maxime, facere reiciendis maiores, laboriosam eligendi sunt exercitationem commodi
                    quos officia ipsa inventore?<br><br>
                    Quibusdam cum voluptatem accusamus illum, quam repellendus deleniti qui, illo distinctio, aperiam
                    quisquam possimus? Totam, eum reiciendis? Veniam aliquam minima repellat expedita eaque vitae,
                    recusandae possimus deserunt odit, culpa sapiente?<br><br>
                    Mollitia optio nesciunt pariatur numquam, error ea ipsum ratione. Nemo reprehenderit inventore maiores
                    placeat corrupti eligendi totam, aspernatur sequi voluptate, quos eius, officia obcaecati. Sequi odit
                    voluptas reiciendis maiores dolorem!<br><br>
                    Voluptatem error adipisci reiciendis harum? Qui corporis totam optio ex praesentium libero veritatis
                    doloremque minus officiis omnis. Nulla eum nihil aliquam illum. Ad ipsa autem cupiditate blanditiis
                    aspernatur expedita veritatis?
                    Ex sapiente aliquid alias voluptatibus quis, odio voluptatem minus? Quasi fuga architecto blanditiis
                    natus ut consectetur hic provident. Nam iure nostrum hic eligendi delectus voluptate magnam omnis quas
                    vitae exercitationem?</p>
            </div>
        </div>
    </div>
@endsection
