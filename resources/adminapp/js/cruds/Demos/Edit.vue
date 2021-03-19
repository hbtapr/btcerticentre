<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.edit') }}
                <strong>{{ $t('cruds.demo.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.question,
                      'is-focused': activeField == 'question'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.demo.fields.question')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.question"
                      @input="updateQuestion"
                      @focus="focusField('question')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.alt_right,
                      'is-focused': activeField == 'alt_right'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.demo.fields.alt_right')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.alt_right"
                      @input="updateAltRight"
                      @focus="focusField('alt_right')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.partner_demo_id !== null,
                      'is-focused': activeField == 'partner_demo'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.demo.fields.partner_demo')
                    }}</label>
                    <v-select
                      name="partner_demo"
                      label="partner_name"
                      :key="'partner_demo-field'"
                      :value="entry.partner_demo_id"
                      :options="lists.partner_demo"
                      :reduce="entry => entry.id"
                      @input="updatePartnerDemo"
                      @search.focus="focusField('partner_demo')"
                      @search.blur="clearFocus"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('DemosSingle', ['entry', 'loading', 'lists'])
  },
  beforeDestroy() {
    this.resetState()
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchEditData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('DemosSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setQuestion',
      'setAltRight',
      'setPartnerDemo'
    ]),
    updateQuestion(e) {
      this.setQuestion(e.target.value)
    },
    updateAltRight(e) {
      this.setAltRight(e.target.value)
    },
    updatePartnerDemo(value) {
      this.setPartnerDemo(value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'demos.index' })
          this.$eventHub.$emit('update-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
