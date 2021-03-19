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
                <strong>{{ $t('cruds.alternative.title_singular') }}</strong>
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
                      'has-items': entry.questions.length !== 0,
                      'is-focused': activeField == 'questions'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.alternative.fields.questions')
                    }}</label>
                    <v-select
                      name="questions"
                      label="question"
                      :key="'questions-field'"
                      :value="entry.questions"
                      :options="lists.questions"
                      :closeOnSelect="false"
                      multiple
                      @input="updateQuestions"
                      @search.focus="focusField('questions')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.theme.length !== 0,
                      'is-focused': activeField == 'theme'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.alternative.fields.theme')
                    }}</label>
                    <v-select
                      name="theme"
                      label="micro_theme"
                      :key="'theme-field'"
                      :value="entry.theme"
                      :options="lists.theme"
                      :closeOnSelect="false"
                      multiple
                      @input="updateTheme"
                      @search.focus="focusField('theme')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.alt_1,
                      'is-focused': activeField == 'alt_1'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.alternative.fields.alt_1')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.alt_1"
                      @input="updateAlt1"
                      @focus="focusField('alt_1')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.alt_2,
                      'is-focused': activeField == 'alt_2'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.alternative.fields.alt_2')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.alt_2"
                      @input="updateAlt2"
                      @focus="focusField('alt_2')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.alt_3,
                      'is-focused': activeField == 'alt_3'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.alternative.fields.alt_3')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.alt_3"
                      @input="updateAlt3"
                      @focus="focusField('alt_3')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.alt_4,
                      'is-focused': activeField == 'alt_4'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.alternative.fields.alt_4')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.alt_4"
                      @input="updateAlt4"
                      @focus="focusField('alt_4')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.alt_5,
                      'is-focused': activeField == 'alt_5'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.alternative.fields.alt_5')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.alt_5"
                      @input="updateAlt5"
                      @focus="focusField('alt_5')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.right_alternative,
                      'is-focused': activeField == 'right_alternative'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.alternative.fields.right_alternative')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.right_alternative"
                      @input="updateRightAlternative"
                      @focus="focusField('right_alternative')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.type_id !== null,
                      'is-focused': activeField == 'type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.alternative.fields.type')
                    }}</label>
                    <v-select
                      name="type"
                      label="question_type"
                      :key="'type-field'"
                      :value="entry.type_id"
                      :options="lists.type"
                      :reduce="entry => entry.id"
                      @input="updateType"
                      @search.focus="focusField('type')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.difficulty_id !== null,
                      'is-focused': activeField == 'difficulty'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.alternative.fields.difficulty')
                    }}</label>
                    <v-select
                      name="difficulty"
                      label="difficulty"
                      :key="'difficulty-field'"
                      :value="entry.difficulty_id"
                      :options="lists.difficulty"
                      :reduce="entry => entry.id"
                      @input="updateDifficulty"
                      @search.focus="focusField('difficulty')"
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
    ...mapGetters('AlternativesSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('AlternativesSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setQuestions',
      'setTheme',
      'setAlt1',
      'setAlt2',
      'setAlt3',
      'setAlt4',
      'setAlt5',
      'setRightAlternative',
      'setType',
      'setDifficulty'
    ]),
    updateQuestions(value) {
      this.setQuestions(value)
    },
    updateTheme(value) {
      this.setTheme(value)
    },
    updateAlt1(e) {
      this.setAlt1(e.target.value)
    },
    updateAlt2(e) {
      this.setAlt2(e.target.value)
    },
    updateAlt3(e) {
      this.setAlt3(e.target.value)
    },
    updateAlt4(e) {
      this.setAlt4(e.target.value)
    },
    updateAlt5(e) {
      this.setAlt5(e.target.value)
    },
    updateRightAlternative(e) {
      this.setRightAlternative(e.target.value)
    },
    updateType(value) {
      this.setType(value)
    },
    updateDifficulty(value) {
      this.setDifficulty(value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'alternatives.index' })
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
