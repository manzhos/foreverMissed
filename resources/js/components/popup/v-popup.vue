<template>
  <div>
    <!-- Dark screen -->
    <div class="dark-screen"> </div>
    <!-- Modal -->
    <div class="v-popup">
      <div class="v-popup__header">
        <span class="popup-title">{{popupTitle}}</span>
        <span style="cursor:pointer" @click="closePopup"><font-awesome-icon icon="fa-solid fa-xmark" /></span>
      </div>
      <div class="v-popup__content">
        <slot></slot>
      </div>
      <div class="v-popup__footer">
        <span class="add-info">{{addInfo}}</span>
        <button class="main-btn" @click="handleBtn">{{ 'Send' }}</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name:"v-popup",
  props: {
    popupTitle: {
      type: String,
      default: ''
    },
    addInfo: {
      type: String,
      default: ''
    }
  },
  methods: {
    closePopup() {
      this.$emit('closePopup');
    },
    handleBtn() {
      this.$emit('handleBtn')
    }
  }
}

</script>

<style lang="scss">
  .dark-screen{
    background: rgba(0, 0, 0, 0.32);
    width: 100vw;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    padding: 0;
    margin: 0;
  }
  .v-popup {
    /* Pop-up */
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 24px 0px;
    gap: 24px;

    position: absolute;
    width: 598px;
    //height: 776px;
    left: calc(50% - 598px/2);
    top: 32px;

    /* Main/Content BG */
    background: #FFF8EF;
    border-radius: 6px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.25);
    &__header {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: space-between;;
      padding: 0px 24px;
      gap: 12px;

      width: 598px;
      height: 32px;
    }
    &__content {
      width: 100%;
    }
    &__footer {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: flex-end;
      padding: 0px 24px;
      gap: 12px;

      width: 598px;
      height: 48px;
    }
    .popup-title{
      font-family: 'Open Sans',serif;
      font-style: normal;
      font-weight: 600;
      font-size: 24px;
      line-height: 32px;
      font-feature-settings: 'ss01' on;
      
      /* Main/Font */
      color: #3C1F1D;

      flex: none;
      order: 0;
      flex-grow: 1;
    }
    .add-info {
      /* Body/Body 2 Regular */

      font-family: 'Open Sans',serif;
      font-style: normal;
      font-weight: 400;
      font-size: 14px;
      line-height: 20px;
      /* identical to box height, or 143% */

      text-align: right;

      /* Main/Font +75 (Font 64%) */

      color: #876A68;


      /* Inside auto layout */

      flex: none;
      order: 1;
      flex-grow: 0;
    }
  }
</style>