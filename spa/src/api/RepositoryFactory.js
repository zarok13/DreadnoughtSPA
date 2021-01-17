import ConfigsRepository from './ConfigsRepository';
import ContactsRepository from './ContactsRepository';
import GalleryRepository from './GalleryRepository';
import HomeRepository from './HomeRepository';
import ProductsRepository from './ProductsRepository';
import StaticRepository from './StaticRepository';


const repositories = {
    contacts: ContactsRepository,
    gallery: GalleryRepository,
    products: ProductsRepository,
    static: StaticRepository,
    home: HomeRepository,
    configs: ConfigsRepository,
}

export const RepositoryFactory = {
    get: name => repositories[name]
};