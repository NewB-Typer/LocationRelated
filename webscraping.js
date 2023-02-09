const axios = require('axios');
const cheerio = require('cheerio');

async function getData() {
  try {
    // Make a GET request to the website you want to scrape
    const response = await axios.get('https://example.com');
    const html = response.data;

    // Use Cheerio to parse the HTML and extract the information you need
    const $ = cheerio.load(html);
    const information = $('.content').text();

    // Analyze the information for specific keywords
    const keywords = ['keyword1', 'keyword2', 'keyword3'];
    let containsKeyword = false;
    keywords.forEach(keyword => {
      if (information.includes(keyword)) {
        containsKeyword = true;
      }
    });

    // Display a message based on the results of the analysis
    if (containsKeyword) {
      console.log('The information contains one or more of the keywords!');
    } else {
      console.log('The information does not contain any of the keywords.');
    }
  } catch (error) {
    console.error(error);
  }
}

getData();
