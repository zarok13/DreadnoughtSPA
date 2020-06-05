<template>
  <div>
    <Header />

    <!-- MAIN -->
    <main role="main">
      <!-- Content -->
      <article>
        <header class="section background-primary text-center">
          <h1
            class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1"
          >Contact US</h1>
        </header>
        <div class="section background-white">
          <div class="line">
            <div class="margin">
              <!-- Company Information -->
              <div class="s-12 m-12 l-6">
                <h2 class="text-uppercase text-strong margin-bottom-30">Company Information</h2>
                <div class="float-left">
                  <i class="icon-placepin background-primary icon-circle-small text-size-20"></i>
                </div>
                <div class="margin-left-80 margin-bottom">
                  <h4 class="text-strong margin-bottom-0">Company Address</h4>
                  <p>
                    Responsive Street 7
                    <br />London
                    <br />UK, Europe
                  </p>
                </div>
                <div class="float-left">
                  <i class="icon-paperplane_ico background-primary icon-circle-small text-size-20"></i>
                </div>
                <div class="margin-left-80 margin-bottom">
                  <h4 class="text-strong margin-bottom-0">E-mail</h4>
                  <p>
                    contact@sampledomain.com
                    <br />office@sampledomain.com
                  </p>
                </div>
                <div class="float-left">
                  <i class="icon-smartphone background-primary icon-circle-small text-size-20"></i>
                </div>
                <div class="margin-left-80">
                  <h4 class="text-strong margin-bottom-0">Phone Numbers</h4>
                  <p>
                    0800 4521 800 50
                    <br />0450 5896 625 16
                    <br />0798 6546 465 15
                  </p>
                </div>
              </div>
              <!-- Contact Form -->
              <div class="s-12 m-12 l-6">
                <h2 class="text-uppercase text-strong margin-bottom-30">Contact Us</h2>
                <form class="customform">
                  <div class="line">
                    <div class="margin">
                      <div class="s-12 m-12 l-6">
                        <input
                          name="email"
                          class="required email border-radius"
                          placeholder="Your e-mail"
                          title="Your e-mail"
                          type="text"
                        />
                      </div>
                      <div class="s-12 m-12 l-6">
                        <input
                          name="name"
                          class="name border-radius"
                          placeholder="Your name"
                          title="Your name"
                          type="text"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="s-12">
                    <input
                      name="subject"
                      class="subject border-radius"
                      placeholder="Subject"
                      title="Subject"
                      type="text"
                    />
                  </div>
                  <div class="s-12">
                    <textarea
                      name="message"
                      class="required message border-radius"
                      placeholder="Your message"
                      rows="3"
                    ></textarea>
                  </div>
                  <div class="s-12 m-12 l-4">
                    <button
                      class="submit-form button background-primary border-radius text-white"
                      type="submit"
                    >Submit Button</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </article>
      <!-- MAP -->
      <MglMap 
          :accessToken="accessToken" 
          :mapStyle="mapStyle"
          @load="onMapLoaded"
          :attributionControl="false"
          >

            <MglScaleControl />
            <!-- <MglPopup :coordinates="markerCoordinates">
              <span>Hello world!</span>
            </Mgl -->Popup>
            <MglMarker :coordinates="markerCoordinates" color="green" >
              <span slot="marker">mdi-map-marker</span>
            </MglMarker>
          </MglMap>
    </main>
<div   style="margin-top: 278px"></div>
    <Footer />
  </div>
</template>
<script>

// import Mapbox from "mapbox-gl";
import { MglMap, 
    MglScaleControl,
    MglMarker } from "vue-mapbox";
import Header from "../components/blocks/Header";
import Footer from "../components/blocks/Footer";

export default {
  name: "contact",
  components: {
    Header,
    Footer,
    MglMap,
    MglScaleControl,
    MglMarker
  },
  data() {
    return {
      accessToken: "pk.eyJ1IjoiemFyb2siLCJhIjoiY2s4Njl5eHpxMDA3dTNubGs5ZDh6ZjJyciJ9.9KM0OsYdbSC3KzlF2tjUEw",
      mapStyle: "mapbox://styles/mapbox/streets-v9",
      markerCoordinates:[
        44.7, 
        41.7
      ]
    };
  },
  created() {
    this.map = null;
  },
  methods:{
     async onMapLoaded(event) {
      const asyncActions = event.component.actions

      const newParams = await asyncActions.flyTo({
        center: [44.7, 41.7],
        zoom: 10,
        speed: 1,
      })
      console.log(newParams)
    }
  }
};
</script>
<style scoped>
</style>