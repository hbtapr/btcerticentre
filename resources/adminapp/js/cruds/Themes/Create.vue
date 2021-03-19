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
                <strong>{{ $t('cruds.theme.title_singular') }}</strong>
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
                      'has-items': entry.micro_theme,
                      'is-focused': activeField == 'micro_theme'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.theme.fields.micro_theme')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.micro_theme"
                      @input="updateMicroTheme"
                      @focus="focusField('micro_theme')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.macro_theme,
                      'is-focused': activeField == 'macro_theme'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.theme.fields.macro_theme')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.macro_theme"
                      @input="updateMacroTheme"
                      @focus="focusField('macro_theme')"
                      @blur="clearFocus"
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
    ...mapGetters('ThemesSingle', ['entry', 'loading'])
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('ThemesSingle', [
      'storeData',
      'resetState',
      'setMicroTheme',
      'setMacroTheme'
    ]),
    updateMicroTheme(e) {
      this.setMicroTheme(e.target.value)
    },
    updateMacroTheme(e) {
      this.setMacroTheme(e.target.value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'themes.index' })
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
