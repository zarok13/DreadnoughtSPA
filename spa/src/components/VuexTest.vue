<template>
  <div>
    <br />
    {{ message }}
    <br />
    <button type="button" @click="pressed()">counter: {{ count }}</button>
    Counter:
    <strong class="counter">{{ appCounter }}</strong>

    <div>
      <button type="button" @click="increaseAppCounter()">Increase by {{ inc}}</button>
      <button type="button" @click="decreaseAppCounter()">decrease by {{ dec}}</button>
    </div>
  </div>
</template>

<script>
import {
  ACTION_APP_INCREMENT,
  ACTION_APP_DECREMENT,
  CALL_INCREMENT
} from "./../store/modules/app.store";

export default {
  name: "vuex",
  data() {
    return {
      welcome: "hello static",
      inc: 50,
      dec: 40
    };
  },
  computed: {
    message() {
      return this.$store.getters.message;
    },
    count() {
      return this.$store.getters.counter;
    },
    appCounter: function() {
      return this.$store.getters.getCounter;
    }
  },
  methods: {
    pressed() {
      this.$store.dispatch(CALL_INCREMENT, 20);
    },
    increaseAppCounter: function() {
      this.$store.dispatch(ACTION_APP_INCREMENT, this.inc);
    },
    decreaseAppCounter: function() {
      this.$store.dispatch(ACTION_APP_DECREMENT, this.dec);
    }
  }
};
</script>

<style scoped>
.counter {
  color: #42b983;
}
</style>