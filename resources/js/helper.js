
class Helper {
    getStorageImage(path, name, category = false, type = 'normal',) {
        const fullPath = `/storage/${path}/${name}`;
      if (name != null){
            return fullPath;
      } else {
          if (path == 'coupon-category') {
            return '/images/category.png';
          } else {
               return this.getDefaultImage(type);
            }
           
         }     
    }

    getDefaultImage(type = 'normal') {
        if (type === 'user') {
            return '/images/user_default.png';
        } else if (type === 'normal') {
            return '/images/default.png';
        }
    }
    formatDate(dateTimeString) {
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        const formattedDate = new Date(dateTimeString).toLocaleDateString('en-US', options);
        return formattedDate;
    }
    capitalizeFirstLetter(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }
    truncateText(text, maxLength) {
        if (text.length > maxLength) {
            return text.slice(0, maxLength) + "...";
        }
        return text;
    }

}

export default new Helper();
