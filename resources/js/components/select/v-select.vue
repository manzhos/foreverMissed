<template>
  <div class="outside-block" v-show="isOptionsOpen" @click="isOptionsOpen = false"></div>
  <div class="v-select">
    <div :class="isOptionsOpen ? 'role-select open' : 'role-select'" @click="isOptionsOpen = !isOptionsOpen">
      {{ curRole.role }}
      <font-awesome-icon v-if="!isOptionsOpen" icon="fa-solid fa-caret-down" />
      <font-awesome-icon v-if="isOptionsOpen" icon="fa-solid fa-caret-up" />
    </div>
    <div class="role-option" v-if="isOptionsOpen">
      <div v-for="role in roles" :key="role.id" class="role-item" @click="setRole(role)">
        <span class="check-span"><font-awesome-icon v-if="curRole.role === role.role" icon="fa-solid fa-check" style="color:#9C4619" /></span>
        <span style="padding-left:12px">
          <div class="role-name">{{role.role}}</div>
          <div class="role-desc">{{role.description}}</div>
        </span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name:"v-select",
  props: {
    roles:{
      type: Array,
      default: []
    },
    curRole:{
      type: Object,
      default: []
    },
    userId:{
      type: Number,
      default: 0
    }
  },
  data() {
    return{
      isOptionsOpen: false
    }
  },
  methods: {
    setRole(role) {
      // console.log('Selected role:', role, this.userId);
      this.$emit('setRole', role, this.userId);
      this.isOptionsOpen = false;
    }
  }
}
</script>

<style scoped>
  .v-select {
    /*position: relative;*/
  }
  .outside-block {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 1;
    display: block;
  }
  .check-span { width: 20px; }
  .role-select {
    font-family: 'Open Sans', serif;
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 20px;
    color: #3C1F1D;
    background: none;
    border: none;

    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start;
    gap: 8px;
    cursor: pointer;
  }
  .open {
    color: #9C4619 !important;
  }
  .role-option {
    position: absolute;
    /*top: 20px;*/
    right: 60px;
    z-index: 100;

    width: 318px;
    background: #FFF8EF;
    box-shadow: 4px 4px 24px rgba(0, 0, 0, 0.16);
    border-radius: 6px;
  }
  .role-option div:hover {
    background: #F6EFE6;
    cursor: pointer;
  }
  .role-item {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    justify-content: flex-start;
    gap: 8px;
    padding: 12px 16px 12px 12px;
  }
  .role-name {
    font-family: 'Open Sans', serif;
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 24px;
    color: #3C1F1D;    
  }
  .role-desc {
    font-family: 'Open Sans', serif;
    font-style: normal;
    font-weight: 400;
    font-size: 12px;
    line-height: 16px;
    color: #876A68;   
  }
   
</style>