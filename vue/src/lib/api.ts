const checkPath: string = '/check';

function buildCheckUrlPath(usernameUrl: string): string {
    return `${checkPath}?url=${encodeURIComponent(usernameUrl)}`;
}

function buildCheckUsernamePath(username: string): string {
    return `${checkPath}?username=${username}`;
}

export type CheckUsernameResponse = {
    found: boolean
}

export async function checkUsernameUrl(usernameUrl: string): Promise<CheckUsernameResponse> {
    const response: Response = await fetch(buildCheckUrlPath(usernameUrl));
    return await response.json();
}

export type GetCheckUriResponse = {
    checkUris: Array<string>
}

export async function fetchCheckUris(username: string): Promise<CheckUsernameResponse> {
    const response: Response = await fetch(buildCheckUsernamePath(username));
    return await response.json();
}
