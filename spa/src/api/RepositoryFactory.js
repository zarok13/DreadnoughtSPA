import ContactsRepository from './ContactsRepository';

const repositories = {
    contacts: ContactsRepository,
    //
}

export const RepositoryFactory = {
    get: name => repositories[name]
};