# Not done yet, but should work please leave any feedback in the [discussions tab](https://github.com/Cool-showTTV/TheBlueAlliance-Embed/discussions)
## one problem that can happen is that I update the site and your cache didn't clear.<br>So sometimes clearing cache can fix the site.
<br>
Also if I ever get the money I may make this have its own domain.<br>
I'm thinking of something like "TheBlueEmbed.com" but I'm not sure.

# Known issues
- Text can be cut off if the text is longer than my given width
- Some names can be cut but I currently don't know any (need some)
- GitHub can show an error instead of the image (refreshing GitHub seems to fix it)
- Probably some more that I forgot

## How to use
Use the [homepage](https://thebluealliance-embed.herokuapp.com) to make links.

## Example
If you want an example of what it looks like here is The Juggernauts' embedded in GitHub.<br>
![events](https://thebluealliance-embed.herokuapp.com/?num=1)<br>
And here is an example of RoboBlitz with a different font and color and double spaced<br>
![events](https://thebluealliance-embed.herokuapp.com/?num=3936&font=Candara&color=00f&doubleSpace=true)


## Future Ideas:
- [ ] Have a JS that can be added to auto-put TBA events for teams. (no real reason just a challenge)
- [ ] Have a different file for getting blue banners of a team.

## [To Do](https://github.com/Cool-showTTV/TheBlueAlliance-Embed/projects/1):
- [X] Home page to make embeds easier for people.
- [X] Custom colors.
- [ ] Add spacing variable.
- [ ] Font size?
- [ ] Add a cache to reduce the load on servers. (GitHub caches but IDK when it gets cleared)

## Set up own version steps:
1. Get an API key from the [accounts page](https://www.thebluealliance.com/account#:~:text=0-,Read%20API%20Keys,-Description)
2. Set an ENV variable named "API-Key" with the key you got
3. Restart your server (if needed)
4. Upload the files and you are done
<br>
You will need to fix where the home page gets its files from like icons and stuff I think though.
