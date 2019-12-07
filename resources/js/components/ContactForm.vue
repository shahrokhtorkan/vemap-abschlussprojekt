<template>
    <form @submit.prevent="submit">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" placeholder="Ihre Name" name="name" id="name" v-model="fields.name" />
            <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
        </div>
        <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="email" class="form-control" placeholder="Ihre Email" name="email" id="email" v-model="fields.email" />
            <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
        </div>
        <div class="form-group">
            <label for="message">Nachricht</label>
            <textarea class="form-control" placeholder="Schreib uns was" id="message" name="message" rows="2" v-model="fields.message"></textarea>
            <div v-if="errors && errors.message" class="text-danger">{{ errors.message[0] }}</div>
        </div>

        <button type="submit" class="btn btn-primary">Nachricht senden</button>

        <div v-if="success" class="alert alert-success mt-3">
            Nachricht wurde erfolgreich gesendet!
        </div>
    </form>
</template>

<script>
    import FormMixin from '../FormMixin';
    export default {
        mixins: [ FormMixin ],
        data() {
            return {
                'action': '/submit',
            }
        }
    }
</script>
