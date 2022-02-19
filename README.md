# Not done yet, but should work please leave any feedback in the [discussions tab](https://github.com/Cool-showTTV/TheBlueAlliance-Embed/discussions)

# Known issues
- Text can be cut off if text is longer than my given width
- Some names can be cut but I currently don't know any (please send some!)
- Probably some more that I forgot

## How to use
Embed this link in an IFrame and replace "teamNum" with the team number you want<br>
```https://thebluealliance-embed.herokuapp.com/?num=teamNum```<br>
If you want to embed into your GitHub's organizations do this and replace "teamNum" with the team number you want<br>
```![events](https://thebluealliance-embed.herokuapp.com/?num=teamNum)```<br>
Or to make the links easyer to make use the [homepage](https://thebluealliance-embed.herokuapp.com).

## Example
If you want an example of what it looks like here is The Juggernauts' embeded in GitHub.<br>
![events](https://thebluealliance-embed.herokuapp.com/?num=1)<br>
And here is an example of RoboBlitz with a diffrent font and color<br>
![events](https://thebluealliance-embed.herokuapp.com/?num=3936&font=Candara&color=00f)


## Future Ideas:
- [ ] Have a JS that can be added to auto put TBA events for teams. (no real reason just a challenge)
- [ ] Have a diffrent file for getting blue banners of a team.

## To Do:
- [ ] Home page to make embeds easier for people.
- [X] Custom colors.
- [ ] Add spacing varible.
- [ ] Font size?

## Set-up own version steps:
1. Get an API key from the [accounts page](https://www.thebluealliance.com/account#:~:text=0-,Read%20API%20Keys,-Description)
2. Set and ENV variable named "API-Key" with the key you got
3. Restart you server (if needed)
4. Upload the files and you are done
You will need to fix where the home page gets its files from like icons and stuff I think though.
