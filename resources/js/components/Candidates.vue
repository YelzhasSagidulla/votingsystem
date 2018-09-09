<template>

    <div>
        <!--Form-->
        <div class="vote-form mb-2">
            <form @submit.prevent="addVote">
                <div class="form-group">
                    <label for="firstnameInput">{{ lang.get('firstname') }}</label>
                    <input type="text" class="form-control" id="firstnameInput" :placeholder="lang.get('enter_firstname')"
                           v-model="candidate.firstname" required>
                </div>

                <div class="form-group">
                    <label for="lastnameInput">{{ lang.get('lastname') }}</label>
                    <input type="text" class="form-control" id="lastnameInput" :placeholder="lang.get('enter_lastname')"
                           v-model="candidate.lastname" required>
                </div>

                <div class="form-group">
                    <label for="patronymicInput">{{ lang.get('patronymic') }}</label>
                    <input type="text" class="form-control" id="patronymicInput" :placeholder="lang.get('enter_patronymic')"
                           v-model="candidate.patronymic" required>
                </div>

                <button type="submit" class="btn btn-primary">{{ lang.get('vote') }}</button>
            </form>
        </div>
        <!--Table-->
        <div class="candidates-list">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">{{ lang.get('id') }}</th>
                        <th scope="col">{{ lang.get('lastname') }}</th>
                        <th scope="col">{{ lang.get('firstname') }}</th>
                        <th scope="col">{{ lang.get('patronymic') }}</th>
                        <th scope="col">{{ lang.get('votes') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- rows -->
                    <tr v-for="candidate, key in candidates" :class="{'candidate-row': (pagination.current_page==1)}">
                        <td>{{ candidate.id }}</td>
                        <td>{{ candidate.lastname }}</td>
                        <td>{{ candidate.firstname }}</td>
                        <td>{{ candidate.patronymic }}</td>
                        <td>{{ candidate.votes_count }}</td>
                        <td><button @click="updateVote(candidate)" class="btn btn-primary">{{ lang.get('vote') }}</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--Pagination-->
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
                    <a class="page-link" href="#" @click.prevent="fetchCandidates(pagination.prev_page_url)">Пред.</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link text-dark" href="#">{{ pagination.current_page }} из {{ pagination.last_page }}</a>
                </li>
                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
                    <a class="page-link" href="#" @click.prevent="fetchCandidates(pagination.next_page_url)">След.</a>
                </li>
            </ul>
        </nav>
    </div>

</template>

<script>

    export default {

        data: function () {
            return {
                candidates: [],
                candidate: {
                    firstname: '',
                    lastname: '',
                    patronymic: '',
                },
                pagination: {}
            }
        },
        created(){
            this.fetchCandidates();
        },
        methods: {
            fetchCandidates(page_url){
                let vm = this;

                page_url = page_url || 'api/candidates';

                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.candidates = res.data;
                        vm.makePagination(res.meta, res.links);
                    })
                    .catch(err => console.log(err));
            },
            makePagination(meta, links){
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },
            addVote(){
                fetch('api/vote', {
                    method: 'post',
                    body: JSON.stringify(this.candidate),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                    .then(res => res.json())
                    .then(data => {

                        this.candidate.firstname  = '';
                        this.candidate.lastname   = '';
                        this.candidate.patronymic = '';

                        this.fetchCandidates();

                        alert( 'Голос отдан!' );
                    })
                    .catch(err => console.log(err));

            },
            updateVote(candidate){

                this.candidate.firstname  = candidate.firstname;
                this.candidate.lastname   = candidate.lastname;
                this.candidate.patronymic = candidate.patronymic;

                this.addVote();
            }
        },
    }

</script>