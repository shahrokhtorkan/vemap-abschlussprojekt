<template>
    <div id="app">
        <form>
            <input type="hidden" name="_token" :value="csrf">
            <div v-if="step === 1">
                <h1>Schritt eins</h1>
                <p>
                    <legend for="Leistungen">Leistungen:</legend>
                    <select id="Leistungen" name="Leistungen" v-model="inquiry.Leistungen">
                        <option value="a">Therapie Aktiv Betreuungsprogramm</option>
                        <option value="b">Marcoumar-Einstellung</option>
                        <option value="c">Schmerztherapie</option>
                        <option value="d">Nahtentfernung</option>
                        <option value="e">Verbandwechsel</option>
                    </select>
                </p>
                <button @click.prevent="next()">Next</button>
            </div>
            <div v-if="step === 2">
                <h1>Schritt zwei</h1>
                <h1>Fragen an Arzt</h1>
                <p>
                    <legend for="q1"> Welche Probleme haben Sie? Sind diese mit Schmerzen verbunden? Warum fühlen Sie
                        sich nicht gut?
                    </legend>
                    <input type="text" id="q1" name="q1" v-model="inquiry.q1">
                </p>
                <p>
                    <legend for="q2">Wann treten die Probleme auf? (morgens, mittags, abends)</legend>
                    <input type="text" id="q2" name="q2" v-model="inquiry.q2">
                </p>
                <p>
                    <legend for="q3">Wobei, bei welchen Tätigkeiten treten die Probleme auf?</legend>
                    <input type="text" id="q3" name="q3" v-model="inquiry.q3">
                </p>
                <p>
                    <legend for="q4">Was habe ich bisher unternommen?</legend>
                    <input type="text" id="q4" name="q4" v-model="inquiry.q4">
                </p>
                <p>
                    <legend for="q5">Gibt es eine Vorbehandlung? Bei welcher Arztpraxis?</legend>
                    <input type="text" id="q5" name="q5" v-model="inquiry.q5">
                </p>
                <button @click.prevent="prev()">Previous</button>
                <button @click.prevent="next()">Next</button>

            </div>
            <div v-if="step === 3">
                <h1>Schritt drei</h1>
                <p>
                    <legend for="name">Ihre Name:</legend>
                    <input id="name" type="text" name="name" v-model="inquiry.name">
                </p>
                <p>
                    <legend for="email">Ihre Email:</legend>
                    <input id="email" name="email" type="email" v-model="inquiry.email">
                </p>
                <p>
                    <legend for="email">Ihre Tel. Nr:</legend>
                    <input id="phone" name="phone" type="text" v-model="inquiry.phone">
                </p>
                <button @click.prevent="prev()">Previous</button>
                <button @click.prevent="create()" type="button" class="btn btn-primary">Save</button>

            </div>
        </form>

        <br/><br/>Test: {{inquiry}}
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                step: 1,
                inquiry: {
                    // Init values for V-Model
                    name: null,
                    email: null,
                    phone: null,
                    q1: null,
                    q2: null,
                    q3: null,
                    q4: null,
                    q5: null,
                    Leistungen: 'a',
                },
                inqiries: [],

                errors: [],

                uri: 'https://patient:8019/contact',
            };
        },
        methods: {
            prev() {
                this.step--;
            },
            next() {
                this.step++;
            },
            create () {
                console.log('Creating inquiry...');
            }
        },
    }
</script>
