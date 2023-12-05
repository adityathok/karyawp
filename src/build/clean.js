import * as fs from 'node:fs/promises';
import {join} from 'path';
import {deleteAsync} from 'del';

deleteAsync(['dist']).then( async() => {
    console.log('delete folder dist');
});