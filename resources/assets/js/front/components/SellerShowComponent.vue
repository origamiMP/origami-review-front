<template>
    <div class="profile-page">
        <div class="page-header header-filter" data-parallax="true"
             :style="'margin-top: -20px;height: 300px; background-image: url('+ seller.image_cover +');'"></div>

        <div class="main main-raised">
            <div class="profile-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            <div class="profile">
                                <div class="avatar">
                                    <img :src="seller.image_profile" alt="Circle Image"
                                         class="img-raised rounded-circle img-fluid">
                                </div>
                                <div class="name">
                                    <h3 class="title">{{seller.name}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">

                        <ul class="nav nav-pills justify-content-center">
                            <li class="nav-item"><a class="nav-link active" href="#pill1" data-toggle="tab">Avis Origami
                                Review</a></li>
                            <li class="nav-item"><a class="nav-link" href="#pill2" data-toggle="tab">Avis externes</a>
                            </li>
                        </ul>
                        <div class="mt-3 tab-content tab-space">
                            <div class="tab-pane active" id="pill1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6 text-center">
                                                <h3>Avis (42) • Bon</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="starrating d-flex float-left flex-row-reverse">
                                                    <input v-model="seller.average_verified_rating" type="radio"
                                                           id="star1" value="5"
                                                           name="star" disabled/>
                                                    <label for="star1"><i class="material-icons">star</i></label>
                                                    <input v-model="seller.average_verified_rating" type="radio"
                                                           id="star2" value="4"
                                                           name="star" disabled/>
                                                    <label for="star1"><i class="material-icons">star</i></label>
                                                    <input v-model="seller.average_verified_rating" type="radio"
                                                           id="star3" value="3"
                                                           name="star" disabled/>
                                                    <label for="star1"><i class="material-icons">star</i></label>
                                                    <input v-model="seller.average_verified_rating" type="radio"
                                                           id="star4" value="2"
                                                           name="star" disabled/>
                                                    <label for="star1"><i class="material-icons">star</i></label>
                                                    <input v-model="seller.average_verified_rating" type="radio"
                                                           id="star5" value="1"
                                                           name="star" disabled/>
                                                    <label for="star1"><i class="material-icons">star</i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-3 pr-0">Excellent</div>
                                            <div class="col-md-8 pl-0">
                                                <div class="mt-2 progress progress-line-primary">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar"
                                                         style="width: 75%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 pl-0">75%</div>
                                            <div class="col-md-3 pr-0">Bon</div>
                                            <div class="col-md-8 pl-0">
                                                <div class="mt-2 progress progress-line-primary">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar"
                                                         style="width: 20%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 pl-0">20%</div>
                                            <div class="col-md-3 pr-0">Moyen</div>
                                            <div class="col-md-8 pl-0">
                                                <div class="mt-2 progress progress-line-primary">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar"
                                                         style="width: 3%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 pl-0">3%</div>
                                            <div class="col-md-3 pr-0">Bas</div>
                                            <div class="col-md-8 pl-0">
                                                <div class="mt-2 progress progress-line-primary">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar"
                                                         style="width: 1%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 pl-0">1%</div>
                                            <div class="col-md-3 pr-0">Mauvais</div>
                                            <div class="col-md-8 pl-0">
                                                <div class="mt-2 progress progress-line-primary">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar"
                                                         style="width: 1%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 pl-0">1%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pill2">
                                Efficiently unleash cross-media information without cross-media value. Quickly maximize
                                timely deliverables for real-time schemas.
                                <br><br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section section-tabs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card" style="margin-bottom: 20px">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6" style="margin: auto;">
                                            <div class="starrating d-flex float-left flex-row-reverse">
                                            <input v-model="seller.average_verified_rating" type="radio"
                                                   id="astar1" value="5"
                                                   name="toto" disabled/>
                                            <label for="astar1" style="font-size: 10px !important;"><i
                                                    class="material-icons">star</i></label>
                                            <input v-model="seller.average_verified_rating" type="radio"
                                                   id="astar2" value="4"
                                                   name="toto" disabled/>
                                            <label for="astar2" style="font-size: 10px !important;"><i
                                                    class="material-icons">star</i></label>
                                            <input v-model="seller.average_verified_rating" type="radio"
                                                   id="astar3" value="3"
                                                   name="toto" disabled/>
                                            <label for="astar3" style="font-size: 10px !important;"><i
                                                    class="material-icons">star</i></label>
                                            <input v-model="seller.average_verified_rating" type="radio"
                                                   id="astar4" value="2"
                                                   name="toto" disabled/>
                                            <label for="astar4" style="font-size: 10px !important;"><i
                                                    class="material-icons">star</i></label>
                                            <input v-model="seller.average_verified_rating" type="radio"
                                                   id="astar5" value="1"
                                                   name="toto" disabled/>
                                            <label for="astar5" style="font-size: 10px !important;"><i
                                                    class="material-icons">star</i></label>
                                        </div>
                                        </div>
                                        <div class="col-md-6" style="margin: auto;">
                                            <span class="float-right">publiée le 7 novembre
                                                2019
                                            </span>

                                        </div>
                                    </div>
                                    <hr/>
                                    <div>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                        irure dolor in reprehenderit in voluptate velit esse
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="margin-bottom: 20px">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6" style="margin: auto;">
                                            <div class="starrating d-flex float-left flex-row-reverse">
                                                <input v-model="seller.average_verified_rating" type="radio"
                                                       id="bstar1" value="5"
                                                       name="tata" disabled/>
                                                <label for="bstar1" style="font-size: 10px !important;"><i
                                                        class="material-icons">star</i></label>
                                                <input v-model="seller.average_verified_rating" type="radio"
                                                       id="bstar2" value="4"
                                                       name="tata" disabled/>
                                                <label for="bstar2" style="font-size: 10px !important;"><i
                                                        class="material-icons">star</i></label>
                                                <input v-model="seller.average_verified_rating" type="radio"
                                                       id="bstar3" value="3"
                                                       name="tata" disabled/>
                                                <label for="bstar3" style="font-size: 10px !important;"><i
                                                        class="material-icons">star</i></label>
                                                <input v-model="seller.average_verified_rating" type="radio"
                                                       id="bstar4" value="2"
                                                       name="tata" disabled/>
                                                <label for="bstar4" style="font-size: 10px !important;"><i
                                                        class="material-icons">star</i></label>
                                                <input v-model="seller.average_verified_rating" type="radio"
                                                       id="bstar5" value="1"
                                                       name="tata" disabled/>
                                                <label for="bstar5" style="font-size: 10px !important;"><i
                                                        class="material-icons">star</i></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin: auto;">
                                            <span class="float-right">publiée le 7 novembre
                                                2019
                                            </span>

                                        </div>
                                    </div>
                                    <hr/>
                                    <div>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                        irure dolor in reprehenderit in voluptate velit esse
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="margin-bottom: 20px">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6" style="margin: auto;">
                                            <div class="starrating d-flex float-left flex-row-reverse">
                                                <input v-model="seller.average_verified_rating" type="radio"
                                                       id="cstar1" value="5"
                                                       name="titi" disabled/>
                                                <label for="cstar1" style="font-size: 10px !important;"><i
                                                        class="material-icons">star</i></label>
                                                <input v-model="seller.average_verified_rating" type="radio"
                                                       id="cstar2" value="4"
                                                       name="titi" disabled/>
                                                <label for="cstar2" style="font-size: 10px !important;"><i
                                                        class="material-icons">star</i></label>
                                                <input v-model="seller.average_verified_rating" type="radio"
                                                       id="cstar3" value="3"
                                                       name="titi" disabled/>
                                                <label for="cstar3" style="font-size: 10px !important;"><i
                                                        class="material-icons">star</i></label>
                                                <input v-model="seller.average_verified_rating" type="radio"
                                                       id="cstar4" value="2"
                                                       name="titi" disabled/>
                                                <label for="cstar4" style="font-size: 10px !important;"><i
                                                        class="material-icons">star</i></label>
                                                <input v-model="seller.average_verified_rating" type="radio"
                                                       id="cstar5" value="1"
                                                       name="titi" disabled/>
                                                <label for="cstar5" style="font-size: 10px !important;"><i
                                                        class="material-icons">star</i></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin: auto;">
                                            <span class="float-right">publiée le 7 novembre
                                                2019
                                            </span>

                                        </div>
                                    </div>
                                    <hr/>
                                    <div>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                        irure dolor in reprehenderit in voluptate velit esse
                                    </div>
                                </div>
                            </div>

                            <nav aria-label="..." class="mt-5">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active">
                                      <span class="page-link">
                                        2
                                        <span class="sr-only">(current)</span>
                                      </span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="margin-bottom: 20px">
                                <div class="card-body">
                                    <h4><b>Comment Se Ruiner</b></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                        irure dolor in reprehenderit in voluptate velit esse</p>
                                    <div class="text-center">
                                        <button class="btn btn-round btn-primary">Visiter Comment Se Ruiner</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="margin-bottom: 20px">
                                <div class="card-body">
                                    <h4><b>Informations de contact :</b></h4>
                                    <div>Ecrire à : <a href="#">contact@commentseruiner.com</a></div>
                                    <div>Appeler le : 0642424242</div>
                                    <div>Nous trouver : 165 avenue de Bretagne 59000 Lille</div>
                                    <div class="text-center">
                                        <button class="mr-3 btn btn-default btn-fab btn-fab-mini btn-round"><i
                                                class="fa fa-facebook"></i></button>
                                        <button class="mr-3 btn btn-default btn-fab btn-fab-mini btn-round"><i
                                                class="fa fa-twitter"></i></button>
                                        <button class="btn btn-default btn-fab btn-fab-mini btn-round"><i
                                                class="fa fa-google-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        seller: {},
      }
    },
    beforeCreate() {
      this.axios.get('/api/sellers/' + this.$route.params.id).then((response) => {
        console.log(response.data);
        this.seller = response.data;
      });
    },
    methods: {}
  }
</script>
