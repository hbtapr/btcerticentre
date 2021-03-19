<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.create') }}
                <strong>{{ $t('cruds.attempt.title_singular') }}</strong>
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
                      'has-items': entry.first_attempt,
                      'is-focused': activeField == 'first_attempt'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.attempt.fields.first_attempt')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      :value="entry.first_attempt"
                      @input="updateFirstAttempt"
                      @focus="focusField('first_attempt')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.second_attempt,
                      'is-focused': activeField == 'second_attempt'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.attempt.fields.second_attempt')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      :value="entry.second_attempt"
                      @input="updateSecondAttempt"
                      @focus="focusField('second_attempt')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.certificates_id !== null,
                      'is-focused': activeField == 'certificates'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.attempt.fields.certificates')
                    }}</label>
                    <v-select
                      name="certificates"
                      label="area"
                      :key="'certificates-field'"
                      :value="entry.certificates_id"
                      :options="lists.certificates"
                      :reduce="entry => entry.id"
                      @input="updateCertificates"
                      @search.focus="focusField('certificates')"
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
    ...mapGetters('AttemptsSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('AttemptsSingle', [
      'storeData',
      'resetState',
      'setFirstAttempt',
      'setSecondAttempt',
      'setCertificates',
      'fetchCreateData'
    ]),
    updateFirstAttempt(e) {
      this.setFirstAttempt(e.target.value)
    },
    updateSecondAttempt(e) {
      this.setSecondAttempt(e.target.value)
    },
    updateCertificates(value) {
      this.setCertificates(value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'attempts.index' })
          this.$eventHub.$emit('create-success')
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
